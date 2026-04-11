<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerformanceReviewRequest;
use App\Models\PerformanceReview;
use App\Contracts\Services\PerformanceReviewServiceInterface;

/**
 * @group HR Management - Performance Reviews
 * API pengelolaan penilaian performa karyawan.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class PerformanceReviewController extends Controller
{
    public function __construct(private readonly PerformanceReviewServiceInterface $performanceReviewService) {}

    /**
     * Display a listing of the resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data review performa berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef80","employee_id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","review_period":"Q1-2026","final_score":89}]}
     */
    public function index()
    {
        $this->authorize('viewAny', PerformanceReview::class);
        $reviews = $this->performanceReviewService->getAll();
        return $this->success($reviews, 'Data review performa berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
        *
        * @response 201 {"meta":{"status":"success","code":201,"message":"Review performa baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef80","review_period":"Q1-2026","final_score":89}}
     */
    public function store(StorePerformanceReviewRequest $request)
    {
        $this->authorize('create', PerformanceReview::class);
        $review = $this->performanceReviewService->create($request->validated());
        return $this->success($review, 'Review performa baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Detail review performa ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef80","review_period":"Q1-2026","final_score":89}}
            * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
            * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(PerformanceReview $performanceReview)
    {
        $this->authorize('view', $performanceReview);
        return $this->success($this->performanceReviewService->show($performanceReview), 'Detail review performa ditemukan');
    }

    /**
     * Update the specified resource in storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data review performa berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef80","final_score":91}}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StorePerformanceReviewRequest $request, PerformanceReview $performanceReview)
    {
        $this->authorize('update', $performanceReview);
        $updatedReview = $this->performanceReviewService->update($performanceReview, $request->validated());
        return $this->success($updatedReview, 'Data review performa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data review performa berhasil dihapus"},"data":null}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(PerformanceReview $performanceReview)
    {
        $this->authorize('delete', $performanceReview);
        $this->performanceReviewService->delete($performanceReview);
        return $this->success(null, 'Data review performa berhasil dihapus');
    }
}
