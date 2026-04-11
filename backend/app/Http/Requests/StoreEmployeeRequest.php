<?php

namespace App\Http\Requests;

class StoreEmployeeRequest extends BaseApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|uuid|exists:users,id',
            'nik' => 'required|string|max:50|unique:employees,nik',
            'full_name' => 'required|string|max:255',
            'division_id' => 'nullable|uuid|exists:divisions,id',
            'position_id' => 'nullable|uuid|exists:positions,id',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'gender' => 'required|in:L,P',
            'join_date' => 'required|date',
            'contract_start_date' => 'nullable|date',
            'contract_end_date' => 'nullable|date',
            'contract_number' => 'nullable|string',
            'leave_quota' => 'nullable|integer|min:0',
            'basic_salary' => 'required|numeric|min:0',
            'status' => 'nullable|in:active,resigned,suspended',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'user_id' => ['description' => 'ID user yang terhubung ke data karyawan.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0efe9'],
            'nik' => ['description' => 'Nomor induk karyawan (unik).', 'example' => 'EMP-2026-001'],
            'full_name' => ['description' => 'Nama lengkap karyawan.', 'example' => 'Budi Setiawan'],
            'division_id' => ['description' => 'ID divisi karyawan.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0ef10'],
            'position_id' => ['description' => 'ID jabatan karyawan.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0ef11'],
            'phone' => ['description' => 'Nomor telepon karyawan.', 'example' => '081234567890'],
            'address' => ['description' => 'Alamat domisili karyawan.', 'example' => 'Jl. Melati No. 10, Jakarta'],
            'gender' => ['description' => 'Jenis kelamin: L (Laki-laki) atau P (Perempuan).', 'example' => 'L'],
            'join_date' => ['description' => 'Tanggal mulai bekerja.', 'example' => '2026-01-10'],
            'contract_start_date' => ['description' => 'Tanggal mulai kontrak.', 'example' => '2026-01-10'],
            'contract_end_date' => ['description' => 'Tanggal akhir kontrak.', 'example' => '2027-01-09'],
            'contract_number' => ['description' => 'Nomor dokumen kontrak.', 'example' => 'CTR-2026-001'],
            'leave_quota' => ['description' => 'Kuota cuti tahunan.', 'example' => 12],
            'basic_salary' => ['description' => 'Gaji pokok karyawan.', 'example' => 6000000],
            'status' => ['description' => 'Status kepegawaian.', 'example' => 'active'],
        ];
    }
}
