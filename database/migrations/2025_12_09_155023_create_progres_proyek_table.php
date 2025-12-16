<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('progres_proyek', function (Blueprint $table) {
            $table->id('progres_id');
            $table->unsignedBigInteger('proyek_id');
            $table->unsignedBigInteger('tahap_id');
            $table->decimal('persen_real', 5, 2);
            $table->date('tanggal');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progres_proyek');
    }
};

