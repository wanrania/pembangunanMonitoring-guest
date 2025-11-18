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
        Schema::create('lokasi_proyek', function (Blueprint $table) {
            $table->id('lokasi_id');
            $table->unsignedBigInteger('proyek_id'); // FK ke proyek
            $table->string('lat');
            $table->string('lng');
            $table->text('geojson')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('proyek_id')
                ->references('proyek_id')
                ->on('proyek')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_proyek');
    }
};
