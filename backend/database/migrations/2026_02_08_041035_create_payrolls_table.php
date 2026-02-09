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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->string('month');
            $table->integer('year');
            $table->decimal('basic_salary_snapshot', 15, 2);
            $table->json('allowance_details')->nullable(); 
            $table->json('deduction_details')->nullable(); 
            $table->decimal('net_salary', 15, 2);
            $table->enum('payment_status', ['paid', 'pending'])->default('pending');
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
