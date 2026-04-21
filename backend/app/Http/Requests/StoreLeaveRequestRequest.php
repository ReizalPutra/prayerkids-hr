<?php

namespace App\Http\Requests;

class StoreLeaveRequestRequest extends BaseApiRequest
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
            'employee_id' => 'required|uuid|exists:employees,id',
            'type' => 'required|in:sick,annual,unpaid',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
            'proof_file' => 'nullable|string',
            'status' => 'nullable|in:pending,approved,rejected',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'employee_id' => ['description' => 'ID karyawan pengaju cuti.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0efe9'],
            'type' => ['description' => 'Jenis cuti: sick, annual, unpaid.', 'example' => 'annual'],
            'start_date' => ['description' => 'Tanggal mulai cuti.', 'example' => '2026-05-10'],
            'end_date' => ['description' => 'Tanggal akhir cuti.', 'example' => '2026-05-12'],
            'reason' => ['description' => 'Alasan pengajuan cuti.', 'example' => 'Keperluan keluarga'],
            'proof_file' => ['description' => 'Path bukti lampiran jika ada.', 'example' => 'proofs/leave-001.pdf'],
            'status' => ['description' => 'Status approval cuti.', 'example' => 'pending'],
        ];
    }
}
