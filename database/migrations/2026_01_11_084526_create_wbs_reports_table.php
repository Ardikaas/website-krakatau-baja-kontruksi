<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('wbs_reports', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique();

            $table->string('judul_kasus');
            $table->string('tipe_insiden');
            $table->text('kejadian');

            $table->string('nama_terlapor');
            $table->string('jabatan_terlapor');
            $table->string('lokasi_kejadian');
            $table->date('tanggal_kejadian');

            $table->text('ada_saksi')->nullable();
            $table->text('motif')->nullable();
            $table->text('pernah_terjadi_sebelumnya')->nullable();

            $table->text('pelanggaran_peraturan')->nullable();
            $table->text('dampak_perusahaan')->nullable();
            $table->string('perkiraan_kerugian')->nullable();
            $table->text('pernah_dilaporkan')->nullable();

            $table->string('nama_pelapor');
            $table->string('email_pelapor');
            $table->string('kontak_pelapor');

            $table->string('dokumen_pendukung')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wbs_reports');
    }
};
