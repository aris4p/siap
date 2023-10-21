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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('kodeObat', 10); // Gunakan tipe data string dengan panjang maksimum 10 karakter jika kode obat adalah kode numerik atau alfanumerik dengan panjang tertentu.
            $table->string('namaObat', 100); // Contoh: Nama obat dengan panjang maksimum 100 karakter.
            $table->string('jenisObat', 50); // Jenis obat, panjang maksimum 50 karakter.
            $table->integer('dosisObat'); // Menggunakan tipe data decimal untuk dosis obat dengan 2 digit di belakang koma.
            $table->text('deskripsiObat'); // Deskripsi obat, tipe data 'text' untuk teks panjang.
            $table->string('satuandosisObat', 20); // Satuan dosis, panjang maksimum 20 karakter.
            $table->string('hargajualObat'); // Harga jual obat dalam tipe data decimal.
            $table->string('hargabeliObat'); // Harga beli obat dalam tipe data decimal.
            $table->integer('stokObat'); // Jumlah stok obat, tipe data 'integer'.
            $table->string('kategoriObat', 50); // Kategori obat, panjang maksimum 50 karakter.
            $table->string('gambarObat')->nullable(); // Nama file gambar obat, dapat bernilai NULL jika tidak ada gambar.
            $table->date('tanggalkadaluarsaObat'); // Tanggal kadaluwarsa obat, tipe data 'date'.

            $table->timestamps(); // Kolom created_at dan updated_at untuk mencatat waktu pembuatan dan pembaruan obat.
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
