@extends('template')
@section('title', 'Awareness Survey Contact Center')
@section('content')
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card mb-3" style="margin-top: -30px;">
              <img src="{{ asset('assets/img/sacc.png') }}" class="card-img-top img-fluid" alt="gambar">
            </div>
            <div class="card card-danger">
              <div class="card-header"><h4>Survey Awareness Honda Care</h4></div>

              <div class="card-body">
                <div class="form-group">
                  <form action="{{ url('/formsubmithc/data') }}" method="post" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="form-group" hidden>
                        <label for="nama">Nama Konsumen</label>
                        <input type="text" class="form-control" value="{{ $data->name }}" type="hidden" name="nama" disabled>
                    </div>
                    <input type="hidden" name="customer_id" value="{{ $data->id }}"> <!-- Tambahkan ini untuk menyertakan customer_id -->

                    <div class="form-group">
                      <label for="jawaban_1">1. Jika ada keluhan mengenai produk/layanan motor honda, kemana dan bagaimana Anda menyampaikan keluhan tersebut ?</label>
                      <select name="jawaban_1" id="jawaban_1" class="form-control selectric" required>
                        <option disabled selected>-- Pilih --</option>
                        <option value="Contact Center Astra Honda Motor">Contact Center Astra Honda Motor</option>
                        <option value="Datang langsung ke Dealer/Bengkel Honda">Datang langsung ke Dealer/Bengkel Honda</option>
                        <option value="Telepon Dealer/Bengkel Honda">Telepon Dealer/Bengkel Honda</option>
                        <option value="Sosmed Dealer/Bengkel Honda">Sosmed Dealer/Bengkel Honda</option>
                        <option value="Apps Dealer/Bengkel Honda">Apps Dealer/Bengkel Honda</option>
                        <option value="Google Review Dealer/Bengkel Honda">Google Review Dealer/Bengkel Honda</option>
                        <option value="Upload sosmed pribadi">Upload sosmed pribadi</option>
                        <option value="Lembaga perlindungan konsumen">Lembaga perlindungan konsumen</option>
                        <option value="Tidak disampaikan">Tidak disampaikan</option>
                        <option value="Other">Other</option>
                      </select>
                      <div id="error_jawaban_1" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                    </div>

                    <div id="pertanyaan_1" style="display: none;">
                      <div class="form-group">
                        <label for="jawaban_1a">Jawaban Lainnya</label>
                        <input id="jawaban_1a" type="text" class="form-control" name="jawaban_1a">
                        <div id="error_jawaban_1a" class="text-danger" style="display:none;">Harap Diisi Keterangan.</div>
                      </div>
                    </div>

                    <div id="pertanyaan_2" style="display: none;">
                      <div class="form-group">
                        <label for="jawaban_2">2. Bapak/ibu jika ada keluhan mengenai motor honda ada gak keinginan menyampaikan ke AHM sebagai produsen ?</label>
                        <select name="jawaban_2" id="jawaban_2" class="form-control selectric" required>
                          <option disabled selected>-- Pilih --</option>
                          <option value="Ya">Ya</option>
                          <option value="Tidak">Tidak</option>
                        </select>
                        <div id="error_jawaban_2" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                      </div>
                    </div>

                    <div id="pertanyaan_3" style="display: none;">
                      <div class="form-group">
                        <label for="jawaban_3">3. Bapak/ibu apa mengetahui Astra Honda Motor memiliki layanan contact center untuk keluhan konsumen ?</label>
                        <select name="jawaban_3" id="jawaban_3" class="form-control selectric" required>
                          <option disabled selected>-- Pilih --</option>
                          <option value="Ya">Ya</option>
                          <option value="Tidak">Tidak</option>
                        </select>
                        <div id="error_jawaban_3" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                      </div>
                    </div>

                    <div id="pertanyaan_4" style="display: none;">
                      <div class="form-group">
                        <label for="jawaban_4">4. Layanan Contact Center Astra Honda Motor yang Anda ketahui ? (Bisa pilih lebih dari 1)</label>
                        <select name="jawaban_4[]" id="jawaban_4" class="form-control selectric" multiple required>
                          <option disabled>-- Pilih --</option>
                          <option value="Call 1500-989">Call 1500-989</option>
                          <option value="IG @astrahondacare_id">IG @astrahondacare_id</option>
                          <option value="FB Astra Honda Care">FB Astra Honda Care</option>
                          <option value="Twitter @astrahondacare">Twitter @astrahondacare</option>
                          <option value="WA : 0811-9500-989">WA : 0811-9500-989</option>
                          <option value="SMS : 0811-9500-989">SMS : 0811-9500-989</option>
                          <option value="Email : customercare@astra-honda.com">Email : customercare@astra-honda.com</option>
                          <option value="Web Astra-Honda.com">Web Astra-Honda.com</option>
                        </select>
                        <div id="error_jawaban_4" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                      </div>
                    </div>

                    <div id="pertanyaan_5" style="display: none;">
                      <div class="form-group">
                        <label for="jawaban_5">5. Dari mana anda mengetahui layanan contact center ?</label>
                        <select name="jawaban_5" id="jawaban_5" class="form-control selectric" required>
                          <option disabled selected>-- Pilih --</option>
                          <option value="Petugas dealer">Petugas dealer</option>
                          <option value="Social Media">Social Media</option>
                          <option value="Buku Servis dan Garansi">Buku Servis dan Garansi</option>
                          <option value="Teman / Keluarga">Teman / Keluarga</option>
                          <option value="Lainnya, sebutkan">Lainnya, sebutkan...</option>
                        </select>
                        <div id="error_jawaban_5" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                      </div>
                    </div>

                    <div id="pertanyaan_5a" style="display: none;">
                    <div class="form-group">
                      <label for="jawaban_5a">Jawaban Lainnya</label>
                      <input id="jawaban_5a" type="text" class="form-control" name="jawaban_5a">
                      <div id="error_jawaban_5a" class="text-danger" style="display:none;">Harap Diisi Keterangan.</div>
                    </div>
                  </div>

                  <div id="pertanyaan_6">
                  <div class="form-group">
                    <label for="jawaban_6">6. Apakah anda mengetahui/pernah mendengar Honda memiliki layanan pertolongan darurat di jalan ?</label>
                    <select name="jawaban_6" id="jawaban_6" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                    <div id="error_jawaban_6" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_7">
                  <div class="form-group">
                    <label for="jawaban_7">7. Apakah anda mengetahui/pernah mendengar layanan Honda Care ?</label>
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
                    <label for="jawaban_8">8. Anda mengetahui layanan honda care/pertolongan darurat dijalan dari mana ?</label>
                    <select name="jawaban_8" id="jawaban_8" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Petugas Dealer">Petugas Dealer</option>
                      <option value="Social Media">Social Media</option>
                      <option value="Buku Servis dan Garansi">Buku Servis dan Garansi</option>
                      <option value="Teman / Keluarga">Teman / Keluarga</option>
                    </select>
                    <div id="error_jawaban_8" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_9" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_9">9. Jika anda memerlukan bantuan darurat dijalan mengenai motor honda, apakah tau harus menghubungi kemana ?</label>
                    <select name="jawaban_9" id="jawaban_9" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Layanan Honda Care">Layanan Honda Care</option>
                      <option value="Bengkel terdekat">Bengkel terdekat</option>
                      <option value="Keluarga">Keluarga</option>
                    </select>
                    <div id="error_jawaban_9" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_10" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_10">10. Apakah tau cara menghubungi layanan honda care ?</label>
                    <select name="jawaban_10" id="jawaban_10" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya (melalui Call,WA,Apps)">Ya (melalui Call,WA,Apps)</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                    <div id="error_jawaban_10" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_11" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_11">11. Jika ada keluhan mengenai produk/layanan motor honda apakah berkenan menghubungi contact center ?</label>
                    <select name="jawaban_11" id="jawaban_11" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                    <div id="error_jawaban_11" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>
                  </div>

                  <div id="pertanyaan_12" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_12">12. Jika suatu saat anda membutuhkan layanan darurat dijalan apakah mau menggunkan layana Honda Care ?</label>
                    <select name="jawaban_12" id="jawaban_12" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                    <div id="error_jawaban_12" class="text-danger" style="display:none;">Harap pilih opsi.</div>
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
    </div>
  </section>
  <div class="simple-footer">
    Copyright &copy; Astra Honda Motor
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function() {
  $('#jawaban_1').change(function() {
    var val = $(this).val();

    if (val === 'Other') {
      $('#pertanyaan_1').show();
    } else {
      $('#pertanyaan_1').hide();
    }

    if (val === 'Contact Center Astra Honda Motor') {
      $('#pertanyaan_4, #pertanyaan_5').show();
      $('#pertanyaan_2, #pertanyaan_3, #pertanyaan_5a').hide();
      $('#jawaban_2, #jawaban_3, #jawaban_5').val(null).prop('selectedIndex', 0).selectric('refresh');
      $('#jawaban_4').val(null).selectric('refresh');
      $('#jawaban_1a, #jawaban_5a').val(null);
      // Hilangkan atribut required dari pertanyaan 2 dan 3
      $('#jawaban_2, #jawaban_3').removeAttr('required');
      $('#error_jawaban_1,#error_jawaban_1a, #error_jawaban_4, #error_jawaban_5, #error_jawaban_7 ').hide();
    } else {
      $('#pertanyaan_2, #pertanyaan_3').show();
      $('#pertanyaan_4, #pertanyaan_5, #pertanyaan_5a' ).hide();
      // Tambahkan atribut required untuk pertanyaan 2 dan 3
      $('#jawaban_2, #jawaban_3').attr('required', 'required');
      $('#error_jawaban_1,#error_jawaban_1a,#error_jawaban_7').hide();
      $('#jawaban_2, #jawaban_3, #jawaban_5').val(null).prop('selectedIndex', 0).selectric('refresh');
      $('#jawaban_4').val(null).selectric('refresh');
      $('#jawaban_1a, #jawaban_5a').val(null);
    }
  });

  $('#jawaban_1a').on('input', function() {
    var inputValue = $(this).val();
    if (inputValue) {
      $('#error_jawaban_1a').hide(); // Sembunyikan pesan kesalahan jika ada input
    } else {
      $('#error_jawaban_1a').show(); // Tampilkan pesan kesalahan jika input kosong
    }
  });

  $('#jawaban_2').change(function() {
    var selectedOptions = $(this).val();
    if (selectedOptions && selectedOptions.length > 0) {
      $('#jawaban_2').removeAttr('required');
      $('#error_jawaban_2').hide();
    } else {
      $('#jawaban_2').removeAttr('required');
      $('#error_jawaban_2').hide();
    }
  });

  $('#jawaban_3').change(function() {
    var val = $(this).val();

    if (val === 'Ya') {
      $('#pertanyaan_4, #pertanyaan_5, #pertanyaan_7').show();
      // Hilangkan atribut required dari pertanyaan 2 dan 3
      $('#jawaban_3').removeAttr('required');
      $('#error_jawaban_3, #error_jawaban_4, #error_jawaban_5').hide();
      $('#jawaban_4, #jawaban_5').val(null).selectric('refresh');
      $('#jawaban_1a, #jawaban_5a').val(null);
    } else {
      $('#pertanyaan_4, #pertanyaan_5, #pertanyaan_5a').hide();
      $('#jawaban_3,#jawaban_4,#jawaban_5, #pertanyaan_5a').removeAttr('required');
      $('#error_jawaban_3').hide();
      $('#jawaban_4, #jawaban_5').val(null).selectric('refresh');
      $('#jawaban_1a, #jawaban_5a').val(null);
    }
  });

  $('#jawaban_4').change(function() {
    var selectedOptions = $(this).val();
    if (selectedOptions && selectedOptions.length > 0) {
      $('#error_jawaban_4').hide();
      $('#jawaban_4').removeAttr('required');
      $(this).selectric('close');
    } else {
      $('#jawaban_4').removeAttr('required');
      $('#error_jawaban_4').show();
    }
  });

  $('#jawaban_5').change(function() {
    var val = $(this).val();

    if (val === 'Lainnya, sebutkan') {
      $('#pertanyaan_5a').show();
      $('#error_jawaban_5').hide(); // Sembunyikan pesan kesalahan
      $('#jawaban_1a, #jawaban_5a').val(null);
    } else {
      $('#pertanyaan_5a').hide();
      $('#error_jawaban_5').hide();
      $('#jawaban_1a, #jawaban_5a').val(null);
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
    if (val === 'Ya') {
      $('#pertanyaan_8, #pertanyaan_9, #pertanyaan_10').show();
      $('#error_jawaban_7').hide();
      $('#jawaban_7').removeAttr('required');
      $('#jawaban_8, #jawaban_9, #jawaban_10').val(null).prop('selectedIndex', 0).selectric('refresh');
    } else {
      $('#pertanyaan_8, #pertanyaan_9, #pertanyaan_10').hide();
      $('#jawaban_7').removeAttr('required');
      $('#error_jawaban_7').hide();
      $('#jawaban_8, #jawaban_9, #jawaban_10').val(null).prop('selectedIndex', 0).selectric('refresh');
    }
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

  $('#submitBtn').click(function() {
    var isValid = true;
    // Validasi masing-masing elemen form yang tampil berdasarkan kondisi
    if ($('#jawaban_1').is(':visible')) {
      if (!$('#jawaban_1').val()) {
        isValid = false;
        $('#error_jawaban_1').show();
      }
    }

    if ($('#jawaban_1a').is(':visible')) {
      if (!$('#jawaban_1a').val()) {
        isValid = false;
        $('#error_jawaban_1a').show();
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
      if (!$('#jawaban_4').val() || $('#jawaban_4').val().length === 0) {
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
