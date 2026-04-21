import api from "@/services/api";
import type { ApiResponse, Division } from "@/types";

export const divisionService = {
  async getAll(): Promise<Division[]> {
    const response = await api.get<ApiResponse<Division[]>>("/divisions");
    return response.data.data;
  },
};
