<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePayrollRequest;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Payroll::class);
        $payrolls = Payroll::with(['employee'])->get();
        return $this->success($payrolls, 'Data gaji berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePayrollRequest $request)
    {
        $this->authorize('create', Payroll::class);
        $payroll = Payroll::create($request->validated());
        return $this->success($payroll->load(['employee']), 'Data gaji baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        $this->authorize('view', $payroll);
        return $this->success($payroll->load(['employee']), 'Detail gaji ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePayrollRequest $request, Payroll $payroll)
    {
        $this->authorize('update', $payroll);
        $payroll->update($request->validated());
        $payroll->refresh();
        return $this->success($payroll->load(['employee']), 'Data gaji berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        $this->authorize('delete', $payroll);
        $payroll->delete();
        return $this->success(null, 'Data gaji berhasil dihapus');
    }
}
