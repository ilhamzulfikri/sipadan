      
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();
      today = yyyy + '-' + mm + '-' + dd;

      $('#tgl_aw_pengumuman,#tgl_ak_pengumuman').change(function() {
          if( $(this).val() == today ){
              $('#ket_pengumuman').prop( "disabled", true );
              $('#ket_pengumuman').val("").change();
          } else {       
              $('#ket_pengumuman').prop("disabled", false );
          }
      });

      $('#tgl_aw_pendaftaran,#tgl_ak_pendaftaran').change(function() {
          if( $(this).val() == today ){
              $('#ket_pendaftaran').prop( "disabled", true );
              $('#ket_pendaftaran').val("").change();
          } else {       
              $('#ket_pendaftaran').prop("disabled", false );
          }
      });

      $('#tgl_aw_penjelasan,#tgl_ak_penjelasan').change(function() {
          if( $(this).val() == today ){
              $('#ket_penjelasan').prop( "disabled", true );
              $('#ket_penjelasan').val("").change();
          } else {       
              $('#ket_penjelasan').prop("disabled", false );
          }
      });

      $('#tgl_aw_upload_penawaran,#tgl_ak_upload_penawaran').change(function() {
          if( $(this).val() == today ){
              $('#ket_upload_penawaran').prop( "disabled", true );
              $('#ket_upload_penawaran').val("").change();
          } else {       
              $('#ket_upload_penawaran').prop("disabled", false );
          }
      });

      $('#tgl_aw_pembukaan_penawaran,#tgl_ak_pembukaan_penawaran').change(function() {
          if( $(this).val() == today ){
              $('#ket_pembukaan_penawaran').prop( "disabled", true );
              $('#ket_pembukaan_penawaran').val("").change();
          } else {       
              $('#ket_pembukaan_penawaran').prop("disabled", false );
          }
      });

      $('#tgl_aw_evaluasi_penawaran,#tgl_ak_evaluasi_penawaran').change(function() {
          if( $(this).val() == today ){
              $('#ket_evaluasi_penawaran').prop( "disabled", true );
              $('#ket_evaluasi_penawaran').val("").change();
          } else {       
              $('#ket_evaluasi_penawaran').prop("disabled", false );
          }
      });

      $('#tgl_aw_evaluasi_dokumen,#tgl_ak_evaluasi_dokumen').change(function() {
          if( $(this).val() == today ){
              $('#ket_evaluasi_dokumen').prop( "disabled", true );
              $('#ket_evaluasi_dokumen').val("").change();
          } else {       
              $('#ket_evaluasi_dokumen').prop("disabled", false );
          }
      });

      $('#tgl_aw_pembuktian_kualifikasi,#tgl_ak_pembuktian_kualifikasi').change(function() {
          if( $(this).val() == today ){
              $('#ket_pembuktian_penawaran').prop( "disabled", true );
              $('#ket_pembuktian_penawaran').val("").change();
          } else {       
              $('#ket_pembuktian_penawaran').prop("disabled", false );
          }
      });

      $('#tgl_aw_klarifikasi_nego,#tgl_ak_klarifikasi_nego').change(function() {
          if( $(this).val() == today ){
              $('#ket_klarifikasi_nego').prop( "disabled", true );
              $('#ket_klarifikasi_nego').val("").change();
          } else {       
              $('#ket_klarifikasi_nego').prop("disabled", false );
          }
      });

      $('#tgl_aw_calon_pemenang,#tgl_ak_calon_pemenang').change(function() {
          if( $(this).val() == today ){
              $('#ket_calon_pemenang').prop( "disabled", true );
              $('#ket_calon_pemenang').val("").change();
          } else {       
              $('#ket_calon_pemenang').prop("disabled", false );
          }
      });

      $('#tgl_aw_upload_ba_pengadaan,#tgl_ak_upload_ba_pengadaan').change(function() {
          if( $(this).val() == today ){
              $('#ket_ba_pengadaan').prop( "disabled", true );
              $('#ket_ba_pengadaan').val("").change();
          } else {       
              $('#ket_ba_pengadaan').prop("disabled", false );
          }
      });

      $('#tgl_aw_penetapan_pemenang,#tgl_ak_penetapan_pemenang').change(function() {
          if( $(this).val() == today ){
              $('#ket_penetapan_pemenang').prop( "disabled", true );
              $('#ket_penetapan_pemenang').val("").change();
          } else {       
              $('#ket_penetapan_pemenang').prop("disabled", false );
          }
      });

      $('#tgl_aw_pengumuman_pemenang,#tgl_ak_pengumuman_pemenang').change(function() {
          if( $(this).val() == today ){
              $('#ket_pengumuman_pemenang').prop( "disabled", true );
              $('#ket_pengumuman_pemenang').val("").change();
          } else {       
              $('#ket_pengumuman_pemenang').prop("disabled", false );
          }
      });

      $('#tgl_aw_masa_sanggah,#tgl_ak_masa_sanggah').change(function() {
          if( $(this).val() == today ){
              $('#ket_masa_sanggah').prop( "disabled", true );
              $('#ket_masa_sanggah').val("").change();
          } else {       
              $('#ket_masa_sanggah').prop("disabled", false );
          }
      });

      $('#tgl_aw_surat_penunjukan,#tgl_ak_surat_penunjukan').change(function() {
          if( $(this).val() == today ){
              $('#ket_surat_penunjukan').prop( "disabled", true );
              $('#ket_surat_penunjukan').val("").change();
          } else {       
              $('#ket_surat_penunjukan').prop("disabled", false );
          }
      });

      $('#tgl_aw_teken_kontrak,#tgl_ak_teken_kontrak').change(function() {
          if( $(this).val() == today ){
              $('#ket_teken_kontrak').prop( "disabled", true );
              $('#ket_teken_kontrak').val("").change();
          } else {       
              $('#ket_teken_kontrak').prop("disabled", false );
          }
      });