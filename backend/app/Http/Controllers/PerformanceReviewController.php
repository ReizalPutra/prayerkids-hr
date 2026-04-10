<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerformanceReviewRequest;
use App\Models\PerformanceReview;
use App\Contracts\Services\PerformanceReviewServiceInterface;

class PerformanceReviewController extends Controller
{
    public function __construct(private readonly PerformanceReviewServiceInterface $performanceReviewService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', PerformanceReview::class);
        $reviews = $this->performanceReviewService->getAll();
        return $this->success($reviews, 'Data review performa berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerformanceReviewRequest $request)
    {
        $this->authorize('create', PerformanceReview::class);
        $review = $this->performanceReviewService->create($request->validated());
        return $this->success($review, 'Review performa baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PerformanceReview $performanceReview)
    {
        $this->authorize('view', $performanceReview);
        return $this->success($this->performanceReviewService->show($performanceReview), 'Detail review performa ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePerformanceReviewRequest $request, PerformanceReview $performanceReview)
    {
        $this->authorize('update', $performanceReview);
        $updatedReview = $this->performanceReviewService->update($performanceReview, $request->validated());
        return $this->success($updatedReview, 'Data review performa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerformanceReview $performanceReview)
    {
        $this->authorize('delete', $performanceReview);
        $this->performanceReviewService->delete($performanceReview);
        return $this->success(null, 'Data review performa berhasil dihapus');
    }
}
