<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('on_duty_rosters', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade'); // Asumsi tabel `lokasi`
            $table->foreignId('manager_on_duty_id')->constrained('employees')->onDelete('cascade'); // Asumsi tabel `employees`
            $table->foreignId('hsse_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('mps_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('ssga_qq_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('rsd_fuel_pagi_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('rsd_fuel_sore_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('rsd_lpg_pagi_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('rsd_lpg_sore_id')->constrained('employees')->onDelete('cascade');
            $table->string('publish')->default('no');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('on_duty_rosters');
    }
};
