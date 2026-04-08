<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerformanceReviewRequest;
use App\Models\PerformanceReview;
use Illuminate\Http\Request;

class PerformanceReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', PerformanceReview::class);
        $reviews = PerformanceReview::with(['employee', 'reviewer'])->get();
        return $this->success($reviews, 'Data review performa berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerformanceReviewRequest $request)
    {
        $this->authorize('create', PerformanceReview::class);
        $review = PerformanceReview::create($request->validated());
        return $this->success($review->load(['employee', 'reviewer']), 'Review performa baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PerformanceReview $performanceReview)
    {
        $this->authorize('view', $performanceReview);
        return $this->success($performanceReview->load(['employee', 'reviewer']), 'Detail review performa ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePerformanceReviewRequest $request, PerformanceReview $performanceReview)
    {
        $this->authorize('update', $performanceReview);
        $performanceReview->update($request->validated());
        $performanceReview->refresh();
        return $this->success($performanceReview->load(['employee', 'reviewer']), 'Data review performa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerformanceReview $performanceReview)
    {
        $this->authorize('delete', $performanceReview);
        $performanceReview->delete();
        return $this->success(null, 'Data review performa berhasil dihapus');
    }
}
