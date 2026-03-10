import api from "@/services/api";
import type { ApiResponse, LoginPayload, LoginResult, User } from "@/types";

export const authService = {
  async login(payload: LoginPayload): Promise<LoginResult> {
    const response = await api.post<ApiResponse<LoginResult>>(
      "/login",
      payload,
    );
    return response.data.data;
  },

  async me(): Promise<User> {
    const response = await api.get<ApiResponse<User>>("/me");
    return response.data.data;
  },

  async logout(): Promise<void> {
    await api.post("/logout");
  },
};
