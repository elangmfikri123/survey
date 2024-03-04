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
                  <form action="{{ url('/formsubmithc2/data') }}" method="post" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="form-group" hidden>
                        <label for="nama">Nama Konsumen</label>
                        <input type="text" class="form-control" value="{{ $data->name }}" type="hidden" name="nama" disabled>
                    </div>
                    <input type="hidden" name="customer_id" value="{{ $data->id }}"> <!-- Tambahkan ini untuk menyertakan customer_id -->

                    <div id="gambar_dinamis" style="margin-bottom: 20px; text-align: center;">
                      <img src="{{ asset('assets/img/hondacare.png') }}" class="img-fluid" alt="gambar dinamis" style="max-width: 200px; max-height: 200px; margin: 0 auto;">
                    </div>

                  <div id="pertanyaan_11">
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

                  <div id="pertanyaan_12">
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

  $('#jawaban_11').change(function() {
  var val = $(this).val();
  var isError = val !== 'Ya' && val !== 'Tidak';
  
  $('#error_jawaban_11').toggle(isError);
  $('#jawaban_11').prop('required', isError);
});

$('#jawaban_12').change(function() {
  var val = $(this).val();
  var isError = val !== 'Ya' && val !== 'Tidak';
  
  $('#error_jawaban_12').toggle(isError);
  $('#jawaban_12').prop('required', isError);
});

  $('#submitBtn').click(function() {
    var isValid = true;
    // Validasi masing-masing elemen form yang tampil berdasarkan kondisi
    if ($('#pertanyaan_11').is(':visible')) {
      if (!$('#jawaban_11').val()) {
        isValid = false;
        $('#error_jawaban_11').show();
      }
    }
    if ($('#pertanyaan_12').is(':visible')) {
      if (!$('#jawaban_12').val()) {
        isValid = false;
        $('#error_jawaban_12').show();
      }
    }

    if (!isValid) {
          return false;
        } else {
      // Jika form valid, tampilkan SweetAlert
      Swal.fire({
        title: 'Form Terkirim',
        text: 'Terima Kasih telah mengisi survey untuk terus meningkatkan pelayanan kami.',
        icon: 'success',
        showConfirmButton: false,
      });

      // Set timeout untuk mengarahkan ke halaman selanjutnya setelah 3 detik
      setTimeout(function() {
        // Menggunakan fungsi submit() untuk mengirimkan formulir
        $('#myForm').submit();
      }, 10000);
    }
  });
});

</script>
@endsection
