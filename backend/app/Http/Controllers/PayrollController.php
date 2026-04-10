<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePayrollRequest;
use App\Models\Payroll;
use App\Contracts\Services\PayrollServiceInterface;

class PayrollController extends Controller
{
    public function __construct(private readonly PayrollServiceInterface $payrollService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Payroll::class);
        $payrolls = $this->payrollService->getAll();
        return $this->success($payrolls, 'Data gaji berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePayrollRequest $request)
    {
        $this->authorize('create', Payroll::class);
        $payroll = $this->payrollService->create($request->validated());
        return $this->success($payroll, 'Data gaji baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        $this->authorize('view', $payroll);
        return $this->success($this->payrollService->show($payroll), 'Detail gaji ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePayrollRequest $request, Payroll $payroll)
    {
        $this->authorize('update', $payroll);
        $updatedPayroll = $this->payrollService->update($payroll, $request->validated());
        return $this->success($updatedPayroll, 'Data gaji berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        $this->authorize('delete', $payroll);
        $this->payrollService->delete($payroll);
        return $this->success(null, 'Data gaji berhasil dihapus');
    }
}
