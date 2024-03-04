@extends('template')
@section('title', 'Awareness Survey')
@section('content')
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card mb-3" style="margin-top: -30px;">
                <img src="{{ asset('assets/img/formcsat.png') }}" class="card-img-top img-fluid" alt="gambar">
            </div>
            <div class="card card-danger">
              <div class="card-header"><h4>Survey Customer Satisfaction Honda Care</h4></div>

              <div class="card-body">
                  <div class="form-group">
                    <form action="{{ url('/formsubmitchc/data') }}" method="post" enctype="multipart/form-data" id="myForm">
                      @csrf
                      <div class="form-group">
                          <label for="nama">Nama Konsumen</label>
                          <input type="text" class="form-control" value="{{ $data->name }}" type="hidden" name="nama" disabled>
                      </div>
                      <input type="hidden" name="customer_id" value="{{ $data->id }}"> <!-- Tambahkan ini untuk menyertakan customer_id -->

                    <div class="form-group">
                    <label for="jawaban_1">1. Apakah sudah pernah menggunakan fasilitas Honda CARE atau pertolongan darurat di jalan ?</label>
                    <select name="jawaban_1" id="jawaban_1" class="form-control selectric" required>
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                      <option value="Tidak Tahu">Tidak Tahu</option>
                    </select>
                    <div id="error_jawaban_1" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>

                  <div id="pertanyaan_2" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_2">2. Darimana Bapak/Ibu mengetahui adanya fasilitas Honda CARE atau pertolongan motor di jalan ?</label>
                    <select name="jawaban_2" id="jawaban_2" class="form-control selectric" required>
                      <option disabled selected>-- Pilih --</option>
                      <option value="BUKU SERVICE">BUKU SERVICE</option>
                      <option value="BROSUR / PRICELIST / KARTU">BROSUR / PRICELIST / KARTU</option>
                      <option value="BANNER / SPANDUK">BANNER / SPANDUK</option>
                      <option value="SOSIAL MEDIA (FB, Twitter, Website Dealer/MD, Instagram, Blog)">SOSIAL MEDIA (FB, Twitter, Website Dealer/MD, Instagram, Blog)</option>
                      <option value="IKLAN SURAT KABAR (Koran, Majalah)">IKLAN SURAT KABAR (Koran, Majalah)</option>
                      <option value="REKOMENDASI ORANG (Teman, Keluarga)">REKOMENDASI ORANG (Teman, Keluarga)</option>
                      <option value="PETUGAS DEALER (Sales Counter, Salesman, Mekanik, SA, dll)">PETUGAS DEALER (Sales Counter, Salesman, Mekanik, SA, dll)</option>
                    </select>
                    <div id="error_jawaban_2" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                </div>

                <div id="pertanyaan_3" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_3">3. Berapa kali Anda harus menghubungi nomer telp.layanan Honda CARE untuk mendapatkan respon ?</label>
                    <select name="jawaban_3" id="jawaban_3" class="form-control selectric" required>
                      <option disabled selected>-- Pilih --</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3 atau lebih">3 atau lebih</option>
                    </select>
                    <div id="error_jawaban_3" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_4" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_4">4. Berapa lama armada/mekanik Honda CARE tiba di lokasi Bapak/Ibu ?</label>
                    <select name="jawaban_4" id="jawaban_4" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Kurang 30 menit"> Kurang 30 menit </option>
                      <option value="30-60 menit">30-60 menit</option>
                      <option value=">60 menit">Lebih 60 menit</option>
                    </select>
                    <div id="error_jawaban_4" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_5" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_5">5. Sudah puaskah dg waktu tunggu mekanik sampai di lokasi Bapak/Ibu ?</label>
                    <select name="jawaban_5" id="jawaban_5" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Puas">Puas</option>
                      <option value="Tidak Puas">Tidak Puas</option>
                    </select>
                    <div id="error_jawaban_5" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_5a" style="display: none;">
                    <div class="form-group">
                      <label for="jawaban_5a">Jika dirasa TIDAK PUAS, idealnya berapa lama waktu tunggu bagi Bapak/Ibu ?</label>
                      <input id="jawaban_5a" type="text" class="form-control" name="jawaban_5a">
                      <div class="invalid-feedback">
                      </div>
                      <div id="error_jawaban_5a" class="text-danger" style="display:none;">Harap Diisi Keterangan.</div>
                    </div>
                  </div>

                  <div id="pertanyaan_6" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_6">6. Apakah tindakan sementara dari mekanik Honda CARE sudah membantu Bapak/Ibu saat membutuhkan pertolongan darurat di jalan ?</label>
                    <select name="jawaban_6" id="jawaban_6" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak, Harus Dibawa Kebengkel">Tidak, Harus Dibawa Kebengkel</option>
                    </select>
                    <div id="error_jawaban_6" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_7" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_7">7. Apakah mekanik Honda CARE menawarkan pembelian suku cadang lain ?</label>
                    <select name="jawaban_7" id="jawaban_7" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                    <div id="error_jawaban_7" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_8" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_8">8. Apakah mekanik Honda CARE menawarkan/menginfokan/promosi produk Honda ?</label>
                    <select name="jawaban_8" id="jawaban_8" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                    <div id="error_jawaban_8" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_9" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_9">9. Secara keseluruhan sudah puaskah dengan pelayanan dari Honda CARE ?</label>
                    <select name="jawaban_9" id="jawaban_9" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Puas">Puas</option>
                      <option value="Tidak Puas">Tidak Puas</option>
                    </select>
                    <div id="error_jawaban_9" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_10" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_10">Jika dirasa TIDAK PUAS, mengapa dan alasannya ?</label>
                    <select name="jawaban_10" id="jawaban_10" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Waktu saat menunggu mekanik tiba di lokasi">Waktu saat menunggu mekanik tiba di lokasi</option>
                      <option value="Layanan yang diberikan mekanik">Layanan yang diberikan mekanik</option>
                      <option value="Waktu saat menunggu mekanik tiba di lokasi">Permasalahan motor tidak selesai di tempat</option>
                      <option value="Lainnya, sebutkan...">Lainnya, sebutkan...</option>
                    </select>
                    <div id="error_jawaban_10" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_10a" style="display: none; margin-top: -25px;">
                    <div class="form-group">
                      <input id="jawaban_11" type="text" class="form-control" name="jawaban_11">
                      <div id="error_jawaban_5a" class="text-danger" style="display:none;">Harap Diisi Keterangan.</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" id="submitBtn">
                      SUBMIT
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="simple-footer">
      Copyright &copy; Astra Honda Motor
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
$(document).ready(function() {
  $('#jawaban_1').change(function() {
    var val = $(this).val();

    if (val === 'Ya') {
      $('#pertanyaan_2, #pertanyaan_3, #pertanyaan_4, #pertanyaan_5, #pertanyaan_6, #pertanyaan_7, #pertanyaan_8, #pertanyaan_9').show();
      $('#jawaban_2, #jawaban_3, #jawaban_4, #jawaban_5, #jawaban_6, #jawaban_7, #jawaban_8, #jawaban_9, #jawaban_10').val(null).prop('selectedIndex', 0).selectric('refresh');
      $('#jawaban_5a, #jawaban_11').val(null);
      // Hilangkan atribut required dari pertanyaan 2 dan 3
      $('#jawaban_2, #jawaban_3').removeAttr('required');
      $('#error_jawaban_1, #error_jawaban_2, #error_jawaban_3, #error_jawaban_4, #error_jawaban_5, #error_jawaban_6, #error_jawaban_7, #error_jawaban_8, #error_jawaban_9').hide();
    } else {
      $('#pertanyaan_2, #pertanyaan_3, #pertanyaan_4, #pertanyaan_5, #pertanyaan_6, #pertanyaan_7, #pertanyaan_8, #pertanyaan_9').hide();
      $('#jawaban_2, #jawaban_3, #jawaban_4, #jawaban_5, #jawaban_6, #jawaban_7, #jawaban_8, #jawaban_9, #jawaban_10').val(null).prop('selectedIndex', 0).selectric('refresh');
      // Tambahkan atribut required untuk pertanyaan 2 dan 3
      $('#jawaban_2, #jawaban_3').attr('required', 'required');
      $('#error_jawaban_1,#error_jawaban_1a,#error_jawaban_7').hide();
      $('#jawaban_5a, #jawaban_11').val(null);
    }
  });

  $('#jawaban_2').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_2').toggle(isError);
    $('#jawaban_2').prop('required', isError);
  });

  $('#jawaban_3').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_3').toggle(isError);
    $('#jawaban_3').prop('required', isError);
  });

  $('#jawaban_4').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_4').toggle(isError);
    $('#jawaban_4').prop('required', isError);
  });

  $('#jawaban_5').change(function() {
    var val = $(this).val();
    if (val === 'Tidak Puas') {
      $('#pertanyaan_5a').show();
      $('#error_jawaban_5').hide(); // Sembunyikan pesan kesalahan
      $('#jawaban_5a').val(null);
    } else {
      $('#pertanyaan_5a').hide();
      $('#error_jawaban_5').hide();
      $('#jawaban_5a').val(null);
      // Munculkan pesan kesalahan jika tidak ada opsi yang dipilih
      if (!val) {
        $('#error_jawaban_5').show();
      }
    }
  });

  $('#jawaban_5a').on('input', function() {
    var inputValue = $(this).val();
    if (inputValue) {
      $('#error_jawaban_5a').hide(); // Sembunyikan pesan kesalahan jika ada input
    } else {
      $('#error_jawaban_5a').show(); // Tampilkan pesan kesalahan jika input kosong
    }
  });

  $('#jawaban_6').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_6').toggle(isError);
    $('#jawaban_6').prop('required', isError);
  });

  $('#jawaban_7').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_7').toggle(isError);
    $('#jawaban_7').prop('required', isError);
  });

  $('#jawaban_8').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_8').toggle(isError);
    $('#jawaban_8').prop('required', isError);
});

$('#jawaban_9').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_9').toggle(isError);
    $('#jawaban_9').prop('required', isError);
});

    $('#jawaban_10').change(function() {
      var val = $(this).val();
      var isError = val === null || val === '-- Pilih --';
      
      $('#error_jawaban_10').toggle(isError);
      $('#jawaban_10').prop('required', isError);
    });

    $('#jawaban_11').change(function() {
      var val = $(this).val();
      var isError = val === null || val === '-- Pilih --';
      
      $('#error_jawaban_11').toggle(isError);
      $('#jawaban_11').prop('required', isError);
    });

  $('#submitBtn').click(function() {
    var isValid = true;
    // Validasi masing-masing elemen form yang tampil berdasarkan kondisi
    if ($('#jawaban_1').is(':visible')) {
      if (!$('#jawaban_1').val()) {
        isValid = false;
        $('#error_jawaban_1').show();
      }
    }
    if ($('#pertanyaan_2').is(':visible')) {
      if (!$('#jawaban_2').val()) {
        isValid = false;
        $('#error_jawaban_2').show();
      }
    }
    if ($('#pertanyaan_3').is(':visible')) {
      if (!$('#jawaban_3').val()) {
        isValid = false;
        $('#error_jawaban_3').show();
      }
    }
    if ($('#pertanyaan_4').is(':visible')) {
      if (!$('#jawaban_4').val()) {
        isValid = false;
        $('#error_jawaban_4').show();
      }
    }
    if ($('#pertanyaan_5').is(':visible')) {
      if (!$('#jawaban_5').val()) {
        isValid = false;
        $('#error_jawaban_5').show();
      }
    }
    if ($('#pertanyaan_5a').is(':visible')) {
      if (!$('#jawaban_5a').val()) {
        isValid = false;
        $('#error_jawaban_5a').show();
      }
    }
    if ($('#pertanyaan_6').is(':visible')) {
      if (!$('#jawaban_6').val()) {
        isValid = false;
        $('#error_jawaban_6').show();
      }
    }
    if ($('#pertanyaan_7').is(':visible')) {
      if (!$('#jawaban_7').val()) {
        isValid = false;
        $('#error_jawaban_7').show();
      }
    }
    if ($('#pertanyaan_8').is(':visible')) {
      if (!$('#jawaban_8').val()) {
        isValid = false;
        $('#error_jawaban_8').show();
      }
    }
    if ($('#pertanyaan_9').is(':visible')) {
      if (!$('#jawaban_9').val()) {
        isValid = false;
        $('#error_jawaban_9').show();
      }
    }
    if ($('#pertanyaan_10').is(':visible')) {
      if (!$('#jawaban_10').val()) {
        isValid = false;
        $('#error_jawaban_10').show();
      }
    }
    if ($('#pertanyaan_11').is(':visible')) {
      if (!$('#jawaban_11').val()) {
        isValid = false;
        $('#error_jawaban_11').show();
      }
    }

    if (!isValid) {
          return false;
        } else {
      // Jika form valid, tampilkan SweetAlert
      // Swal.fire({
      //   title: 'Form Terkirim',
      //   text: 'Terima Kasih telah mengisi survey untuk terus meningkatkan pelayanan kami.',
      //   icon: 'success',
      //   showConfirmButton: false,
      // });

      // // Set timeout untuk mengarahkan ke halaman selanjutnya setelah 3 detik
      // setTimeout(function() {
      //   // Menggunakan fungsi submit() untuk mengirimkan formulir
      //   $('#myForm').submit();
      // }, 10000);
    }
  });
});
  </script>
@endsection