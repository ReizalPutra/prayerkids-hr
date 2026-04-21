import { useMutation, useQuery, useQueryClient } from "@tanstack/react-query";
import { authService } from "@/services/auth";
import type { ApiErrorResponse, LoginPayload } from "@/types";

const TOKEN_KEY = "token";

export const authKeys = {
  me: ["auth", "me"] as const,
};

export const getStoredToken = () => localStorage.getItem(TOKEN_KEY);

export const clearStoredToken = () => localStorage.removeItem(TOKEN_KEY);

export const useMeQuery = () => {
  const token = getStoredToken();

  return useQuery({
    queryKey: authKeys.me,
    queryFn: authService.me,
    enabled: Boolean(token),
    staleTime: 1000 * 60,
  });
};

export const useLoginMutation = () => {
  const queryClient = useQueryClient();

  return useMutation({
    mutationFn: (payload: LoginPayload) => authService.login(payload),
    onSuccess: async (result) => {
      localStorage.setItem(TOKEN_KEY, result.access_token);
      await queryClient.invalidateQueries({ queryKey: authKeys.me });
    },
  });
};

export const useLogoutMutation = () => {
  const queryClient = useQueryClient();

  return useMutation({
    mutationFn: authService.logout,
    onSettled: async () => {
      clearStoredToken();
      await queryClient.clear();
    },
  });
};

export const getApiErrorMessage = (error: unknown): string => {
  const fallback = "Terjadi kesalahan. Silakan coba lagi.";

  if (typeof error !== "object" || error === null) {
    return fallback;
  }

  const axiosError = error as {
    message?: string;
    code?: string;
    request?: unknown;
    response?: {
      data?: ApiErrorResponse;
    };
  };

  const backendMessage = axiosError.response?.data?.meta?.message;
  if (backendMessage) {
    return backendMessage;
  }

  if (axiosError.request && !axiosError.response) {
    return "Tidak dapat terhubung ke server API. Cek URL API, CORS, dan koneksi internet.";
  }

  if (axiosError.code === "ECONNABORTED") {
    return "Koneksi ke server timeout. Silakan coba lagi.";
  }

  return axiosError.message ?? fallback;
};
