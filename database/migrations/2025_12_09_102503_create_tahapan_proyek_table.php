<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tahapan_proyek', function (Blueprint $table) {
            $table->id('tahap_id');
            $table->unsignedBigInteger('proyek_id');
            $table->string('nama_tahap');
            $table->decimal('target_persen', 5, 2);
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->timestamps();

            $table->foreign('proyek_id')
                  ->references('proyek_id')
                  ->on('proyek')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tahapan_proyek');
    }
};
