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
                  </div>

                  <div id="pertanyaan_2" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_2">2. Darimana Bapak/Ibu mengetahui adanya fasilitas Honda CARE atau pertolongan motor di jalan ?</label>
                    <select name="jawaban_2" id="jawaban_2" class="form-control selectric" required>
                      <option disabled selected>-- Pilih --</option>
                      <option value="BUKU SERVICE">BUKU SERVICE</option>
                      <option value="BROSUR / PRICELIST / KARTU">BROSUR / PRICELIST / KARTU</option>
                      <option value="ANNER / SPANDUK">ANNER / SPANDUK</option>
                      <option value="SOSIAL MEDIA (FB, Twitter, Website Dealer/MD, Instagram, Blog)">SOSIAL MEDIA (FB, Twitter, Website Dealer/MD, Instagram, Blog)</option>
                      <option value="IKLAN SURAT KABAR (Koran, Majalah)">IKLAN SURAT KABAR (Koran, Majalah)</option>
                      <option value="REKOMENDASI ORANG (Teman, Keluarga)">REKOMENDASI ORANG (Teman, Keluarga)</option>
                      <option value="PETUGAS DEALER (Sales Counter, Salesman, Mekanik, SA, dll)">PETUGAS DEALER (Sales Counter, Salesman, Mekanik, SA, dll)</option>
                    </select>
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
                  </div>
                  </div>

                  <div id="pertanyaan_4" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_4">4. Berapa lama armada/mekanik Honda CARE tiba di lokasi Bapak/Ibu ?</label>
                    <select name="jawaban_4" id="jawaban_4" class="form-control selectric" multiple>
                      <option disabled selected>-- Pilih --</option>
                      <option value="Kurang 30 menit"> Kurang 30 menit </option>
                      <option value="30-60 menit">30-60 menit</option>
                      <option value=">60 menit">Lebih 60 menit</option>
                    </select>
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
                  </div>
                  </div>

                  <div id="pertanyaan_5a" style="display: none;">
                    <div class="form-group">
                      <label for="jawaban_5a">Jika dirasa TIDAK PUAS, idealnya berapa lama waktu tunggu bagi Bapak/Ibu ?</label>
                      <input id="jawaban_5a" type="text" class="form-control" name="jawaban_5a">
                      <div class="invalid-feedback">
                      </div>
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
                  </div>
                  </div>
                  <div id="pertanyaan_10a" style="display: none; margin-top: -25px;">
                    <div class="form-group">
                      <input id="jawaban_11" type="text" class="form-control" name="jawaban_11">
                      <div class="invalid-feedback">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
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
    // Fungsi untuk menangani perubahan pada jawaban pertanyaan 1
    function handleJawaban1Change() {
      var value = $('#jawaban_1').val();
      var pertanyaan1Div = $('#pertanyaan_1');
      var pertanyaan2Div = $('#pertanyaan_2');
      var pertanyaan3Div = $('#pertanyaan_3');
      var pertanyaan4Div = $('#pertanyaan_4');
      var pertanyaan5Div = $('#pertanyaan_5');
      var pertanyaan6Div = $('#pertanyaan_6');
      var pertanyaan7Div = $('#pertanyaan_7');
      var pertanyaan8Div = $('#pertanyaan_8');
      var pertanyaan9Div = $('#pertanyaan_9');


            // Perlihatkan pertanyaan2_3Div jika jawaban pertanyaan 1 bukan "Contact Center Astra Honda Motor"
      if (value === "Ya") {
        pertanyaan2Div.show();
        pertanyaan3Div.show();
        pertanyaan4Div.show();
        pertanyaan5Div.show();
        pertanyaan6Div.show();
        pertanyaan7Div.show();
        pertanyaan8Div.show();
        pertanyaan9Div.show();
      } else {
        pertanyaan2Div.hide();
        pertanyaan3Div.hide();
        pertanyaan4Div.hide();
        pertanyaan5Div.hide();
        pertanyaan6Div.hide();
        pertanyaan7Div.hide();
        pertanyaan8Div.hide();
        pertanyaan9Div.hide();
      }
    }
  
    // Panggil fungsi pada peristiwa perubahan pada jawaban pertanyaan 1
    $('#jawaban_1').change(handleJawaban1Change);

    // Fungsi untuk menangani perubahan pada jawaban pertanyaan 1
      function handleJawaban5Change() {
      var value = $('#jawaban_5').val();
      var pertanyaan5aDiv = $('#pertanyaan_5a');
  
      // Perlihatkan pertanyaan_1Div jika jawaban pertanyaan 1 adalah "Other"
      if (value === "Tidak Puas") {
        pertanyaan5aDiv.show();
      } else {
        pertanyaan5aDiv.hide();
      }
    }
  
    // Panggil fungsi pada peristiwa perubahan pada jawaban pertanyaan 1
    $('#jawaban_5').change(handleJawaban5Change);

    
    // Fungsi untuk menangani perubahan pada jawaban pertanyaan 1
      function handleJawaban9Change() {
      var value = $('#jawaban_9').val();
      var pertanyaan10Div = $('#pertanyaan_10');
  
      // Perlihatkan pertanyaan_1Div jika jawaban pertanyaan 1 adalah "Other"
      if (value === "Tidak Puas") {
        pertanyaan10Div.show();
      } else {
        pertanyaan10Div.hide();
      }
    }
        // Panggil fungsi pada peristiwa perubahan pada jawaban pertanyaan 1
        $('#jawaban_9').change(handleJawaban9Change);

            // Fungsi untuk menangani perubahan pada jawaban pertanyaan 1
      function handleJawaban10Change() {
      var value = $('#jawaban_10').val();
      var pertanyaan10aDiv = $('#pertanyaan_10a');
  
      // Perlihatkan pertanyaan_1Div jika jawaban pertanyaan 1 adalah "Other"
      if (value === "Lainnya, sebutkan...") {
        pertanyaan10aDiv.show();
      } else {
        pertanyaan10aDiv.hide();
      }
    }
        // Panggil fungsi pada peristiwa perubahan pada jawaban pertanyaan 1
        $('#jawaban_10').change(handleJawaban10Change);
  
      // Tangkap submit form
      $('#myForm').submit(function(e) {
        e.preventDefault(); // Mencegah formulir dikirim dengan cara biasa
        // Lakukan pengiriman formulir dengan Ajax
        $.ajax({
          type: 'POST',
          url: '/formsubmitchc/data', // Ganti dengan URL yang benar
          data: $(this).serialize(),
          success: function(response) {
            // Tampilkan SweetAlert2 setelah formulir dikirim
            Swal.fire({
              title: 'Jawaban Terkirim',
              text: 'Terima Kasih telah mengisi survey untuk terus meningkatkan pelayanan kami',
              icon: 'success',
              showConfirmButton: false,
            });
            var table = $('#myTable').DataTable(); // Ganti 'yourDataTableId' dengan ID sesuai dengan tabel datatables Anda
            var row = table.row('#row_' + {{ $data->id }});
  
            // Perbarui status di kolom 'status'
            if (row) {
              var statusColumn = row.cell('.status');
              statusColumn.data('<span class="badge badge-success">Terisi</span>');
              row.draw();
            }
          },
          error: function(error) {
            console.log(error);
            // Handle error jika ada
          }
        });
      });
    });
  </script>
@endsection