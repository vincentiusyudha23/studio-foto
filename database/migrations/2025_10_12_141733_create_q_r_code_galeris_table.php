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
        Schema::create('q_r_code_galeris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pemesanans')->cascadeOnDelete();
            $table->string('link');
            $table->boolean('status')->default(0);
            $table->date('expired_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('q_r_code_galeris');
    }
};
