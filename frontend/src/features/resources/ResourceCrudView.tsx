import { useMemo, useState } from "react";
import { useQueries } from "@tanstack/react-query";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import type {
  ResourceConfig,
  ResourceField,
} from "@/features/resources/resource-config";
import {
  useCreateResourceMutation,
  useDeleteResourceMutation,
  useResourceListQuery,
  useShowResourceMutation,
  useUpdateResourceMutation,
  type ResourceRecord,
} from "@/hooks/useResourceCrud";
import { getApiErrorMessage } from "@/hooks/useAuth";
import api from "@/services/api";
import type { ApiResponse } from "@/types";

const prettyJson = (value: unknown) => JSON.stringify(value, null, 2);

const getFieldDefaultValue = (
  field: ResourceField,
  samplePayload: Record<string, unknown>,
) => {
  if (field.optionsFrom) {
    return "";
  }

  if (samplePayload[field.key] !== undefined) {
    return samplePayload[field.key];
  }

  if (field.type === "checkbox") {
    return false;
  }

  return "";
};

const buildDefaultFormState = (config: ResourceConfig) =>
  Object.fromEntries(
    config.fields.map((field) => [
      field.key,
      getFieldDefaultValue(field, config.samplePayload),
    ]),
  ) as Record<string, unknown>;

const buildFormFromRecord = (config: ResourceConfig, row: ResourceRecord) =>
  Object.fromEntries(
    config.fields.map((field) => [
      field.key,
      row[field.key] ?? getFieldDefaultValue(field, config.samplePayload),
    ]),
  ) as Record<string, unknown>;

const normalizePayload = (
  config: ResourceConfig,
  form: Record<string, unknown>,
) => {
  const payload: Record<string, unknown> = {};

  config.fields.forEach((field) => {
    const rawValue = form[field.key];

    if (rawValue === "" || rawValue === null || rawValue === undefined) {
      return;
    }

    if (field.type === "number") {
      const parsed = Number(rawValue);
      if (!Number.isNaN(parsed)) {
        payload[field.key] = parsed;
      }
      return;
    }

    if (field.type === "checkbox") {
      payload[field.key] = Boolean(rawValue);
      return;
    }

    payload[field.key] = rawValue;
  });

  return payload;
};

type ResourceCrudViewProps = {
  config: ResourceConfig;
};

function ResourceCrudView({ config }: ResourceCrudViewProps) {
  const [createForm, setCreateForm] = useState<Record<string, unknown>>(() =>
    buildDefaultFormState(config),
  );
  const [editForm, setEditForm] = useState<Record<string, unknown>>(() =>
    buildDefaultFormState(config),
  );
  const [isCreateFormOpen, setIsCreateFormOpen] = useState(false);
  const [isEditFormOpen, setIsEditFormOpen] = useState(false);
  const [editingId, setEditingId] = useState<string | null>(null);
  const [selectedDetail, setSelectedDetail] = useState<ResourceRecord | null>(
    null,
  );

  const listQuery = useResourceListQuery(config.endpoint);
  const createMutation = useCreateResourceMutation(config.endpoint);
  const updateMutation = useUpdateResourceMutation(config.endpoint);
  const deleteMutation = useDeleteResourceMutation(config.endpoint);
  const showMutation = useShowResourceMutation(config.endpoint);

  const rows = useMemo(() => listQuery.data ?? [], [listQuery.data]);
  const relationSources = useMemo(() => {
    return Array.from(
      new Set(
        config.fields
          .filter((field) => Boolean(field.optionsFrom?.endpoint))
          .map((field) => field.optionsFrom?.endpoint ?? ""),
      ),
    ).filter(Boolean);
  }, [config]);

  const relationQueries = useQueries({
    queries: relationSources.map((endpoint) => ({
      queryKey: ["resource", endpoint, "options"],
      queryFn: async () => {
        const response = await api.get<ApiResponse<ResourceRecord[]>>(endpoint);
        return response.data.data;
      },
    })),
  });

  const relationDataMap = useMemo(() => {
    return relationSources.reduce<Record<string, ResourceRecord[]>>(
      (accumulator, endpoint, index) => {
        accumulator[endpoint] = relationQueries[index]?.data ?? [];
        return accumulator;
      },
      {},
    );
  }, [relationQueries, relationSources]);

  const relationLoading = relationQueries.some((query) => query.isLoading);
  const relationError = relationQueries.find((query) => query.isError);

  const setFormValue = (
    mode: "create" | "edit",
    field: ResourceField,
    value: string | boolean,
  ) => {
    if (mode === "create") {
      setCreateForm((previous) => ({ ...previous, [field.key]: value }));
      return;
    }

    setEditForm((previous) => ({ ...previous, [field.key]: value }));
  };

  const handleCreate = async () => {
    const payload = normalizePayload(config, createForm);
    await createMutation.mutateAsync(payload);
    setCreateForm(buildDefaultFormState(config));
    setIsCreateFormOpen(false);
  };

  const handleStartEdit = (row: ResourceRecord) => {
    setEditingId(row.id);
    setEditForm(buildFormFromRecord(config, row));
    setIsEditFormOpen(true);
  };

  const handleUpdate = async () => {
    if (!editingId) {
      return;
    }

    const payload = normalizePayload(config, editForm);
    await updateMutation.mutateAsync({ id: editingId, payload });
    setEditingId(null);
    setEditForm(buildDefaultFormState(config));
    setIsEditFormOpen(false);
  };

  const handleShow = async (id: string) => {
    const result = await showMutation.mutateAsync(id);
    setSelectedDetail(result);
  };

  const handleDelete = async (id: string) => {
    if (!window.confirm("Yakin ingin menghapus data ini?")) {
      return;
    }
    await deleteMutation.mutateAsync(id);
  };

  const renderField = (mode: "create" | "edit", field: ResourceField) => {
    const form = mode === "create" ? createForm : editForm;
    const value = form[field.key];
    const relationRows = field.optionsFrom
      ? (relationDataMap[field.optionsFrom.endpoint] ?? [])
      : [];
    const selectOptions =
      field.options ??
      relationRows.map((row) => ({
        label: String(row[field.optionsFrom?.labelKey ?? "name"] ?? row.id),
        value: String(row[field.optionsFrom?.valueKey ?? "id"] ?? row.id),
      }));

    if (field.type === "textarea") {
      return (
        <div key={`${mode}-${field.key}`} className="space-y-2">
          <Label htmlFor={`${mode}-${field.key}`}>{field.label}</Label>
          <textarea
            id={`${mode}-${field.key}`}
            className="min-h-24 w-full rounded-md border border-border bg-background px-3 py-2 text-sm"
            required={field.required}
            placeholder={field.placeholder}
            value={String(value ?? "")}
            onChange={(event) => setFormValue(mode, field, event.target.value)}
          />
        </div>
      );
    }

    if (field.type === "select") {
      return (
        <div key={`${mode}-${field.key}`} className="space-y-2">
          <Label htmlFor={`${mode}-${field.key}`}>{field.label}</Label>
          <select
            id={`${mode}-${field.key}`}
            className="h-10 w-full rounded-md border border-border bg-background px-3 text-sm"
            required={field.required}
            value={String(value ?? "")}
            onChange={(event) => setFormValue(mode, field, event.target.value)}
          >
            <option value="">Pilih {field.label}</option>
            {selectOptions.map((option) => (
              <option
                key={`${field.key}-${String(option.value)}`}
                value={String(option.value)}
              >
                {option.label}
              </option>
            ))}
          </select>
        </div>
      );
    }

    if (field.type === "checkbox") {
      return (
        <label
          key={`${mode}-${field.key}`}
          className="flex items-center gap-2 text-sm"
        >
          <input
            id={`${mode}-${field.key}`}
            type="checkbox"
            className="h-4 w-4 rounded border-border"
            checked={Boolean(value)}
            onChange={(event) =>
              setFormValue(mode, field, event.target.checked)
            }
          />
          {field.label}
        </label>
      );
    }

    const inputType = field.type === "datetime" ? "datetime-local" : field.type;

    return (
      <div key={`${mode}-${field.key}`} className="space-y-2">
        <Label htmlFor={`${mode}-${field.key}`}>{field.label}</Label>
        <Input
          id={`${mode}-${field.key}`}
          type={inputType}
          required={field.required}
          placeholder={field.placeholder}
          value={String(value ?? "")}
          onChange={(event) => setFormValue(mode, field, event.target.value)}
        />
      </div>
    );
  };

  return (
    <section className="space-y-6">
      <Card>
        <CardHeader>
          <CardTitle>{config.title}</CardTitle>
          <CardDescription>{config.description}</CardDescription>
        </CardHeader>
      </Card>

      <div className="grid gap-4 lg:grid-cols-2">
        <Card>
          <CardHeader>
            <div className="flex items-center justify-between gap-3">
              <div>
                <CardTitle>Create</CardTitle>
                <CardDescription>
                  Form visual untuk endpoint POST {config.endpoint}
                </CardDescription>
              </div>
              <Button
                type="button"
                variant="outline"
                onClick={() => setIsCreateFormOpen((previous) => !previous)}
              >
                {isCreateFormOpen ? "Tutup Form" : "Buka Form Tambah"}
              </Button>
            </div>
          </CardHeader>
          {isCreateFormOpen ? (
            <CardContent className="space-y-3">
              <div className="grid gap-3">
                {config.fields.map((field) => renderField("create", field))}
              </div>
              <Button onClick={handleCreate} disabled={createMutation.isPending}>
                {createMutation.isPending ? "Menyimpan..." : "Create Data"}
              </Button>
              {createMutation.isError ? (
                <p className="text-sm text-destructive">
                  {getApiErrorMessage(createMutation.error)}
                </p>
              ) : null}
            </CardContent>
          ) : null}
        </Card>

        <Card>
          <CardHeader>
            <div className="flex items-center justify-between gap-3">
              <div>
                <CardTitle>Update</CardTitle>
                <CardDescription>
                  Pilih data dari tabel lalu edit lewat form visual endpoint PUT.
                </CardDescription>
              </div>
              <Button
                type="button"
                variant="outline"
                onClick={() => setIsEditFormOpen((previous) => !previous)}
                disabled={!editingId && !isEditFormOpen}
              >
                {isEditFormOpen ? "Tutup Form" : "Buka Form Edit"}
              </Button>
            </div>
          </CardHeader>
          {isEditFormOpen ? (
            <CardContent className="space-y-3">
              <p className="text-xs text-muted-foreground">
                Editing ID: {editingId ?? "-"}
              </p>
              <div className="grid gap-3">
                {config.fields.map((field) => renderField("edit", field))}
              </div>
              <div className="flex gap-2">
                <Button
                  onClick={handleUpdate}
                  disabled={!editingId || updateMutation.isPending}
                >
                  {updateMutation.isPending ? "Memperbarui..." : "Update Data"}
                </Button>
                <Button
                  variant="outline"
                  onClick={() => {
                    setEditingId(null);
                    setIsEditFormOpen(false);
                    setEditForm(buildDefaultFormState(config));
                  }}
                >
                  Reset
                </Button>
              </div>
              {updateMutation.isError ? (
                <p className="text-sm text-destructive">
                  {getApiErrorMessage(updateMutation.error)}
                </p>
              ) : null}
            </CardContent>
          ) : null}
        </Card>
      </div>

      {relationLoading ? (
        <p className="text-sm text-muted-foreground">Memuat opsi relasi...</p>
      ) : null}
      {relationError ? (
        <p className="text-sm text-destructive">
          {getApiErrorMessage(relationError.error)}
        </p>
      ) : null}

      <Card>
        <CardHeader>
          <CardTitle>List Data</CardTitle>
          <CardDescription>
            Data asli dari endpoint GET {config.endpoint}
          </CardDescription>
        </CardHeader>
        <CardContent>
          {listQuery.isLoading ? <p>Memuat data...</p> : null}
          {listQuery.isError ? (
            <p className="text-sm text-destructive">
              {getApiErrorMessage(listQuery.error)}
            </p>
          ) : null}

          {listQuery.isSuccess ? (
            <div className="overflow-x-auto">
              <table className="min-w-full border-collapse text-sm">
                <thead>
                  <tr className="border-b border-border text-left">
                    <th className="p-2">ID</th>
                    {config.columns.map((column) => (
                      <th key={column.key} className="p-2">
                        {column.label}
                      </th>
                    ))}
                    <th className="p-2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  {rows.map((row) => (
                    <tr key={row.id} className="border-b border-border/60">
                      <td className="max-w-40 truncate p-2 font-mono text-xs">
                        {row.id}
                      </td>
                      {config.columns.map((column) => (
                        <td key={column.key} className="max-w-56 truncate p-2">
                          {String(row[column.key] ?? "-")}
                        </td>
                      ))}
                      <td className="p-2">
                        <div className="flex flex-wrap gap-2">
                          <Button
                            size="xs"
                            variant="outline"
                            onClick={() => handleShow(row.id)}
                          >
                            Detail
                          </Button>
                          <Button
                            size="xs"
                            variant="outline"
                            onClick={() => handleStartEdit(row)}
                          >
                            Edit
                          </Button>
                          <Button
                            size="xs"
                            variant="destructive"
                            onClick={() => handleDelete(row.id)}
                            disabled={deleteMutation.isPending}
                          >
                            Hapus
                          </Button>
                        </div>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          ) : null}
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>Detail Response</CardTitle>
          <CardDescription>
            Hasil endpoint show ({config.endpoint}/{"{id}"})
          </CardDescription>
        </CardHeader>
        <CardContent>
          <pre className="overflow-x-auto rounded-md border border-border bg-muted/30 p-3 text-xs">
            {prettyJson(
              selectedDetail ?? { message: "Klik tombol Detail pada tabel" },
            )}
          </pre>
          {showMutation.isError ? (
            <p className="mt-2 text-sm text-destructive">
              {getApiErrorMessage(showMutation.error)}
            </p>
          ) : null}
        </CardContent>
      </Card>
    </section>
  );
}

export default ResourceCrudView;
