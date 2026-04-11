<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Contracts\Services\EmployeeServiceInterface;

/**
 * @group HR Management - Employees
 * API pengelolaan data karyawan.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class EmployeeController extends Controller
{
    public function __construct(private readonly EmployeeServiceInterface $employeeService) {}

    /**
     * Display a listing of the resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data karyawan berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","nik":"EMP-2026-001","full_name":"Budi Setiawan","status":"active"}]}
     */
    public function index()
    {
        $this->authorize('viewAny', Employee::class);
        $employees = $this->employeeService->getAll();
        return $this->success($employees, 'Data karyawan berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @response 201 {"meta":{"status":"success","code":201,"message":"Karyawan baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","nik":"EMP-2026-001","full_name":"Budi Setiawan","status":"active"}}
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->authorize('create', Employee::class);
        $employee = $this->employeeService->create($request->validated());
        return $this->success($employee, 'Karyawan baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Detail karyawan ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","nik":"EMP-2026-001","full_name":"Budi Setiawan","status":"active"}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(Employee $employee)
    {
        $this->authorize('view', $employee);
        return $this->success($this->employeeService->show($employee), 'Detail karyawan ditemukan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data karyawan berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","nik":"EMP-2026-001","full_name":"Budi S.","status":"active"}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $this->authorize('update', $employee);
        $updatedEmployee = $this->employeeService->update($employee, $request->validated());
        return $this->success($updatedEmployee, 'Data karyawan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Karyawan berhasil dihapus (Soft Delete)"},"data":null}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);
        $this->employeeService->delete($employee);
        return $this->success(null, 'Karyawan berhasil dihapus (Soft Delete)');
    }
}
