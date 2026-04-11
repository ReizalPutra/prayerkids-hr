<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePayrollRequest;
use App\Models\Payroll;
use App\Contracts\Services\PayrollServiceInterface;

/**
 * @group HR Management - Payrolls
 * API pengelolaan data penggajian.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class PayrollController extends Controller
{
    public function __construct(private readonly PayrollServiceInterface $payrollService) {}

    /**
     * Display a listing of the resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data gaji berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef70","employee_id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","month":"April","year":2026,"net_salary":6600000}]}
     */
    public function index()
    {
        $this->authorize('viewAny', Payroll::class);
        $payrolls = $this->payrollService->getAll();
        return $this->success($payrolls, 'Data gaji berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
        *
        * @response 201 {"meta":{"status":"success","code":201,"message":"Data gaji baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef70","employee_id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","month":"April","year":2026,"net_salary":6600000}}
     */
    public function store(StorePayrollRequest $request)
    {
        $this->authorize('create', Payroll::class);
        $payroll = $this->payrollService->create($request->validated());
        return $this->success($payroll, 'Data gaji baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Detail gaji ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef70","month":"April","year":2026,"net_salary":6600000}}
    * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
    * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(Payroll $payroll)
    {
        $this->authorize('view', $payroll);
        return $this->success($this->payrollService->show($payroll), 'Detail gaji ditemukan');
    }

    /**
     * Update the specified resource in storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data gaji berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef70","payment_status":"paid"}}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StorePayrollRequest $request, Payroll $payroll)
    {
        $this->authorize('update', $payroll);
        $updatedPayroll = $this->payrollService->update($payroll, $request->validated());
        return $this->success($updatedPayroll, 'Data gaji berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data gaji berhasil dihapus"},"data":null}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(Payroll $payroll)
    {
        $this->authorize('delete', $payroll);
        $this->payrollService->delete($payroll);
        return $this->success(null, 'Data gaji berhasil dihapus');
    }
}
