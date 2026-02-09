<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_vacancy_id')->constrained('job_vacancies')->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('resume_path');
            $table->enum('stage', [
                'applied',      // Baru masuk
                'screening',    // Lolos cek CV
                'interview',    // Sedang wawancara
                'offering',     // Tawar gaji
                'hired',        // Diterima
                'rejected'      // Ditolak
            ])->default('applied');
            $table->timestamps();
            $table->unique(['job_vacancy_id', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
