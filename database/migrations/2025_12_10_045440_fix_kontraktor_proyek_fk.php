<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('kontraktor', function (Blueprint $table) {
            // 1. Pastikan null tidak boleh lagi
            $table->unsignedBigInteger('proyek_id')->nullable(false)->change();

            // 2. Drop FK lama (biar tidak bentrok)
            $table->dropForeign(['proyek_id']);

            // 3. Tambah FK baru yang kuat
            $table->foreign('proyek_id')
                  ->references('proyek_id')
                  ->on('proyek')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('kontraktor', function (Blueprint $table) {
            $table->dropForeign(['proyek_id']);
            $table->unsignedBigInteger('proyek_id')->nullable()->change();
        });
    }
};
