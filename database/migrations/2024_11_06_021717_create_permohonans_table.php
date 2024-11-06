<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nomor_iden'); // NIK/KTP/Paspor
            $table->string('alamat');
            $table->string('telphone');
            $table->string('pekerjaan');
            $table->string('file_identitas'); // Path file identitas
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->text('rincian_informasi');
            $table->text('jenis_informasi')->nullable(); // Menyimpan jenis informasi
            $table->string('informasi_lainnya')->nullable();
            $table->text('tujuan_penggunaan')->nullable(); // Menyimpan tujuan penggunaan informasi
            $table->string('tujuan_lainnya')->nullable();
            $table->string('status')->default('Menunggu');
            $table->string('file_upload')->nullable(); 
            
            // Menambahkan kolom waktu_masuk dan waktu_selesai
            $table->date('waktu_selesai')->nullable(); // Menyimpan waktu selesai

            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan');
    }
};
