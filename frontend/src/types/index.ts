export interface ApiResponse<T> {
  meta: {
    code: number;
    status: string;
    message: string;
  };
  data: T;
}

export interface ApiErrorResponse {
  meta: {
    code: number;
    status: string;
    message: string;
  };
  errors?: Record<string, string[]> | null;
}

export interface User {
  id: number;
  name: string;
  username: string;
  role: "admin" | "hr" | "employee";
}

export interface LoginPayload {
  username: string;
  password: string;
}

export interface LoginResult {
  access_token: string;
  user: User;
}

export interface Division {
  id: number;
  name: string;
  description?: string | null;
}

export interface Employee {
  id: number;
  nik: string;
  full_name: string;
  position?: {
    id: number;
    title: string;
  };
  division?: {
    id: number;
    name: string;
  };
  join_date: string;
  status: "active" | "resign" | "suspended";
}
