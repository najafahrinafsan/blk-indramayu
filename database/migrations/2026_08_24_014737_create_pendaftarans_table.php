<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {

            $table->id();

            $table->string('nama_lengkap');

            $table->string('nik', 16);

            $table->string('tempat_lahir');

            $table->date('tanggal_lahir');

            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan'
            ]);

            $table->text('alamat');

            $table->string('no_hp', 20);

            $table->string('email')->nullable();

            $table->string('pendidikan_terakhir');

            $table->string('program_pelatihan');

            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Ditolak'
            ])->default('Menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};