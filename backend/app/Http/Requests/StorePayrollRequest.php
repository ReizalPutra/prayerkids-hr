<?php

namespace App\Http\Requests;

class StorePayrollRequest extends BaseApiRequest
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
            'month' => 'required|string|max:20',
            'year' => 'required|integer|min:2000',
            'basic_salary_snapshot' => 'required|numeric|min:0',
            'allowance_details' => 'nullable|array',
            'deduction_details' => 'nullable|array',
            'net_salary' => 'required|numeric|min:0',
            'payment_status' => 'nullable|in:paid,pending',
            'payment_date' => 'nullable|date',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'employee_id' => ['description' => 'ID karyawan penerima gaji.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0efe9'],
            'month' => ['description' => 'Periode bulan payroll.', 'example' => 'April'],
            'year' => ['description' => 'Periode tahun payroll.', 'example' => 2026],
            'basic_salary_snapshot' => ['description' => 'Snapshot gaji pokok saat payroll diproses.', 'example' => 6000000],
            'allowance_details' => ['description' => 'Rincian tunjangan (object key-value).', 'example' => ['transport' => 500000, 'meal' => 300000]],
            'deduction_details' => ['description' => 'Rincian potongan (object key-value).', 'example' => ['bpjs' => 200000]],
            'net_salary' => ['description' => 'Gaji bersih yang dibayarkan.', 'example' => 6600000],
            'payment_status' => ['description' => 'Status pembayaran: paid atau pending.', 'example' => 'pending'],
            'payment_date' => ['description' => 'Tanggal pembayaran.', 'example' => '2026-04-30'],
        ];
    }
}
