import { useMutation, useQuery, useQueryClient } from "@tanstack/react-query";
import api from "@/services/api";
import type { ApiResponse } from "@/types";

export type ResourceRecord = Record<string, unknown> & { id: string };

const resourceKeys = {
  list: (endpoint: string) => ["resource", endpoint, "list"] as const,
};

export const useResourceListQuery = (endpoint: string) =>
  useQuery({
    queryKey: resourceKeys.list(endpoint),
    enabled: Boolean(endpoint),
    queryFn: async () => {
      const response = await api.get<ApiResponse<ResourceRecord[]>>(endpoint);
      return response.data.data;
    },
  });

export const useCreateResourceMutation = (endpoint: string) => {
  const queryClient = useQueryClient();

  return useMutation({
    mutationFn: async (payload: Record<string, unknown>) => {
      const response = await api.post<ApiResponse<ResourceRecord>>(endpoint, payload);
      return response.data.data;
    },
    onSuccess: async () => {
      await queryClient.invalidateQueries({ queryKey: resourceKeys.list(endpoint) });
    },
  });
};

export const useUpdateResourceMutation = (endpoint: string) => {
  const queryClient = useQueryClient();

  return useMutation({
    mutationFn: async (params: { id: string; payload: Record<string, unknown> }) => {
      const response = await api.put<ApiResponse<ResourceRecord>>(
        `${endpoint}/${params.id}`,
        params.payload,
      );
      return response.data.data;
    },
    onSuccess: async () => {
      await queryClient.invalidateQueries({ queryKey: resourceKeys.list(endpoint) });
    },
  });
};

export const useDeleteResourceMutation = (endpoint: string) => {
  const queryClient = useQueryClient();

  return useMutation({
    mutationFn: async (id: string) => {
      await api.delete(`${endpoint}/${id}`);
    },
    onSuccess: async () => {
      await queryClient.invalidateQueries({ queryKey: resourceKeys.list(endpoint) });
    },
  });
};

export const useShowResourceMutation = (endpoint: string) =>
  useMutation({
    mutationFn: async (id: string) => {
      const response = await api.get<ApiResponse<ResourceRecord>>(`${endpoint}/${id}`);
      return response.data.data;
    },
  });
