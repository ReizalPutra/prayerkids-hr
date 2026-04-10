<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Contracts\Services\EmployeeServiceInterface;

class EmployeeController extends Controller
{
    public function __construct(private readonly EmployeeServiceInterface $employeeService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Employee::class);
        $employees = $this->employeeService->getAll();
        return $this->success($employees, 'Data karyawan berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->authorize('create', Employee::class);
        $employee = $this->employeeService->create($request->validated());
        return $this->success($employee, 'Karyawan baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $this->authorize('view', $employee);
        return $this->success($this->employeeService->show($employee), 'Detail karyawan ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $this->authorize('update', $employee);
        $updatedEmployee = $this->employeeService->update($employee, $request->validated());
        return $this->success($updatedEmployee, 'Data karyawan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);
        $this->employeeService->delete($employee);
        return $this->success(null, 'Karyawan berhasil dihapus (Soft Delete)');
    }
}
