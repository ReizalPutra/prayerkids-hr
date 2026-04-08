<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Employee::class);
        $employees = Employee::with(['user', 'division', 'position'])->get();
        return $this->success($employees, 'Data karyawan berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->authorize('create', Employee::class);
        $employee = Employee::create($request->validated());
        return $this->success($employee->load(['user', 'division', 'position']), 'Karyawan baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $this->authorize('view', $employee);
        return $this->success($employee->load(['user', 'division', 'position']), 'Detail karyawan ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $this->authorize('update', $employee);
        $employee->update($request->validated());
        $employee->refresh();
        return $this->success($employee->load(['user', 'division', 'position']), 'Data karyawan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);
        $employee->delete();
        return $this->success(null, 'Karyawan berhasil dihapus (Soft Delete)');
    }
}
