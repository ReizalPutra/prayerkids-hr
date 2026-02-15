// 1. Standar Response dari Backend (Sesuai Trait ApiResponse Laravel)
export interface ApiResponse<T> {
  meta: {
    code: number;
    status: string;
    message: string;
  };
  data: T;
}

// 2. Tipe Data User (Login)
export interface User {
  id: number;
  name: string;
  username: string;
  role: 'admin' | 'hr' | 'employee';
}

// 3. Tipe Data Login Response
export interface LoginResponse {
  access_token: string;
  token_type: string;
  user: User;
}

// 4. Tipe Data Karyawan
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
  status: 'active' | 'resign' | 'suspended';
}