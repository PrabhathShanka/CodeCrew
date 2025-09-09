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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('promotion_code_id')->nullable()->constrained('promotion_codes')->onDelete('set null');
            $table->enum('subject', [
                'Computer Science(IT)',
                'Medicine(Nursing,Pharmacy,Laboratory)',
                'Management',
                'Accounting',
                'Finance',
                'Economics',
                'Marketing',
                'Mathematics',
                'Engineering',
                'Law',
                'Other'
            ]);
            $table->date('deadline')->nullable();
            $table->enum('contact_type',[
                'whatsapp',
                'telegram',
                'email',
                'other'
            ]);
            $table->string('contact_info');
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
