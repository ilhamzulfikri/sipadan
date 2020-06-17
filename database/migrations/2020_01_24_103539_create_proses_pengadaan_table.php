<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProsesPengadaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proses_pengadaan', function (Blueprint $table) {
            $table->increments('id');

            $table->string('pengumuman');
            $table->date('tgl_aw_pengumuman');
            $table->date('tgl_ak_pengumuman');
            $table->date('tgl_real_pengumuman');
            $table->string('ket_pengumuman');

            $table->string('pendaftaran');
            $table->date('tgl_aw_pendaftaran');
            $table->date('tgl_ak_pendaftaran');
            $table->date('tgl_real_pendaftaran');
            $table->string('ket_pendaftaran');
            
            $table->string('penjelasan');
            $table->date('tgl_aw_penjelasan');
            $table->date('tgl_ak_penjelasan');
            $table->date('tgl_real_penjelasan');
            $table->string('ket_penjelasan');
            
            $table->string('upload_penawaran');
            $table->date('tgl_aw_upload_penawaran');
            $table->date('tgl_ak_upload_penawaran');
            $table->date('tgl_real_upload_penawaran');
            $table->string('ket_upload_penawaran');
            
            $table->string('pembukaan_penawaran');
            $table->date('tgl_aw_pembukaan_penawaran');
            $table->date('tgl_ak_pembukaan_penawaran');
            $table->date('tgl_real_pembukaan_penawaran');
            $table->string('ket_pembukaan_penawaran');
            
            $table->string('evaluasi_penawaran');
            $table->date('tgl_aw_evaluasi_penawaran');
            $table->date('tgl_ak_evaluasi_penawaran');
            $table->date('tgl_real_evaluasi_penawaran');
            $table->string('ket_evaluasi_penawaran');

            $table->string('pembuktian_kualifikasi');
            $table->date('tgl_aw_pembuktian_kualifikasi');
            $table->date('tgl_ak_pembuktian_kualifikasi');
            $table->date('tgl_real_pembuktian_penawaran');
            $table->string('ket_pembuktian_penawaran');

            $table->string('klarifikasi_nego');
            $table->date('tgl_aw_klarifikasi_nego');
            $table->date('tgl_ak_klarifikasi_nego');
            $table->date('tgl_real_klarifikasi_nego');
            $table->string('ket_klarifikasi_nego');

            $table->string('calon_pemenang');
            $table->date('tgl_aw_calon_pemenang');
            $table->date('tgl_ak_calon_pemenang');
            $table->date('tgl_real_calon_pemenang');
            $table->string('ket_calon_pemenang');

            $table->string('upload_ba_pengadaan');
            $table->date('tgl_aw_upload_ba_pengadaan');
            $table->date('tgl_ak_upload_ba_pengadaan');
            $table->date('tgl_real_ba_pengadaan');
            $table->string('ket_ba_pengadaan');

            $table->string('penetapan_pemenang');
            $table->date('tgl_aw_penetapan_pemenang');
            $table->date('tgl_ak_penetapan_pemenang');
            $table->date('tgl_real_penetapan_pemenang');
            $table->string('ket_penetapan_pemenang');

            $table->string('pengumuman_pemenang');
            $table->date('tgl_aw_pengumuman_pemenang');
            $table->date('tgl_ak_pengumuman_pemenang');
            $table->date('tgl_real_pengumuman_pemenang');
            $table->string('ket_pengumuman_pemenang');

            $table->string('masa_sanggah');
            $table->date('tgl_aw_masa_sanggah');
            $table->date('tgl_ak_masa_sanggah');
            $table->date('tgl_real_masa_sanggah');
            $table->string('ket_masa_sanggah');

            $table->string('surat_penunjukan');
            $table->date('tgl_aw_surat_penunjukan');
            $table->date('tgl_ak_surat_penunjukan');
            $table->date('tgl_real_surat_penunjukan');
            $table->string('ket_surat_penunjukan');

            $table->string('teken_kontrak');
            $table->date('tgl_aw_teken_kontrak');
            $table->date('tgl_ak_teken_kontrak');
            $table->date('tgl_real_teken_kontrak');
            $table->string('ket_teken_kontrak');

            $table->integer('notadinas_id');
            $table->integer('hpe_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
