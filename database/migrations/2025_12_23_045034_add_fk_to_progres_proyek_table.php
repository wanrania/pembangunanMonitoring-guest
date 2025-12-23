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
        Schema::table('progres_proyek', function (Blueprint $table) {

            // FK ke tabel proyek
            $table->foreign('proyek_id')
                ->references('proyek_id')
                ->on('proyek')
                ->onDelete('cascade');

            // FK ke tabel tahapan_proyek
            $table->foreign('tahap_id')
                ->references('tahap_id')
                ->on('tahapan_proyek')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('progres_proyek', function (Blueprint $table) {

            // DROP FK
            $table->dropForeign(['proyek_id']);
            $table->dropForeign(['tahap_id']);
        });
    }
};
