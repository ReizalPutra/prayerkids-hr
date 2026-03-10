import { useDivisionsQuery } from "@/hooks/useDivisions";

function EmployeePage() {
  const divisionsQuery = useDivisionsQuery();

  return (
    <section>
      <h1 className="text-2xl font-semibold">Employee</h1>
      <p className="mt-2 text-sm text-muted-foreground">
        Contoh konsumsi API resource: <code>/api/divisions</code>
      </p>

      {divisionsQuery.isLoading ? (
        <p className="mt-4">Memuat divisi...</p>
      ) : null}

      {divisionsQuery.isError ? (
        <p className="mt-4 text-sm text-destructive">
          Gagal mengambil data divisi.
        </p>
      ) : null}

      {divisionsQuery.isSuccess ? (
        <ul className="mt-4 space-y-2">
          {divisionsQuery.data.map((division) => (
            <li
              key={division.id}
              className="rounded-md border border-border px-3 py-2"
            >
              <p className="font-medium">{division.name}</p>
              {division.description ? (
                <p className="text-sm text-muted-foreground">
                  {division.description}
                </p>
              ) : null}
            </li>
          ))}
        </ul>
      ) : null}
    </section>
  );
}

export default EmployeePage;
