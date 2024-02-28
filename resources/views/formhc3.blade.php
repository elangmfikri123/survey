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
                      <p>Terima Kasih telah mengisi Survey Awareness Contact Center & Honda Care.</p>
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
    // // Fungsi untuk menangani perubahan pada jawaban pertanyaan 1
    // function handleJawaban1Change() {
    //   var value = $('#jawaban_1').val();
    //   var pertanyaan1Div = $('#pertanyaan_1');
    //   var pertanyaan2Div = $('#pertanyaan_2');
    //   var pertanyaan3Div = $('#pertanyaan_3');
    //   var pertanyaan4Div = $('#pertanyaan_4');
    //   var pertanyaan5Div = $('#pertanyaan_5');
  
    //   // Perlihatkan pertanyaan_1Div jika jawaban pertanyaan 1 adalah "Other"
    //   if (value === "Other") {
    //     pertanyaan1Div.show();
    //   } else {
    //     pertanyaan1Div.hide();
    //   }

    //         // Perlihatkan pertanyaan2_3Div jika jawaban pertanyaan 1 bukan "Contact Center Astra Honda Motor"
    //   if (value !== "Contact Center Astra Honda Motor") {
    //     pertanyaan2Div.show();
    //     pertanyaan3Div.show();
    //   } else {
    //     pertanyaan2Div.hide();
    //     pertanyaan3Div.hide();
    //   }
  
    //   if (value === "Contact Center Astra Honda Motor") {
    //     pertanyaan4Div.show();
    //     pertanyaan5Div.show();
    //   } else {
    //     pertanyaan4Div.hide();
    //     pertanyaan5Div.hide();
    //   }
    // }
  
  
    // // Panggil fungsi pada peristiwa perubahan pada jawaban pertanyaan 1
    // $('#jawaban_1').change(handleJawaban1Change);
  
    // // Fungsi untuk menangani perubahan pada jawaban pertanyaan 3
    // function handleJawaban3Change() {
    //   var value = $('#jawaban_3').val();
    //   var pertanyaan3Div = $('#pertanyaan_3');
    //   var pertanyaan4Div = $('#pertanyaan_4'); // Perubahan ID
    //   var pertanyaan5Div = $('#pertanyaan_5');
  
    //   // Sembunyikan pertanyaan4_5Div jika jawaban pertanyaan 3 adalah "Tidak"
    //   if (value === "Tidak") {
    //     pertanyaan4Div.hide();
    //     pertanyaan5Div.hide();

    //     // Tampilkan SweetAlert2 jika jawaban pertanyaan 3 adalah "Tidak"
    //     Swal.fire({
    //       text: 'Anda telah memilih untuk tidak menyampaikan keluhan. Apakah Anda yakin ingin melanjutkan?',
    //       iconHtml: '<img src="{{ asset('assets/img/Cc.png') }}" style="width: 270px; height: 150px;">',
    //       showCancelButton: false,
    //     });
    //   } else {
    //     pertanyaan4Div.show();
    //     pertanyaan5Div.show();
    //   }
    // }
  
    // // Panggil fungsi pada peristiwa perubahan pada jawaban pertanyaan 3
    // $('#jawaban_3').change(handleJawaban3Change);

    //   // Fungsi untuk menangani perubahan pada jawaban pertanyaan 1
    //   function handleJawaban5Change() {
    //   var value = $('#jawaban_5').val();
    //   var pertanyaan5aDiv = $('#pertanyaan_5a');
  
    //   // Perlihatkan pertanyaan_1Div jika jawaban pertanyaan 1 adalah "Other"
    //   if (value === "Lainnya, sebutkan") {
    //     pertanyaan5aDiv.show();
    //   } else {
    //     pertanyaan5aDiv.hide();
    //   }
    // }
  
    // // Panggil fungsi pada peristiwa perubahan pada jawaban pertanyaan 1
    // $('#jawaban_5').change(handleJawaban5Change);
  
      // Tangkap submit form
      $('#myForm').submit(function(e) {
        e.preventDefault(); // Mencegah formulir dikirim dengan cara biasa
        // Lakukan pengiriman formulir dengan Ajax
        $.ajax({
          type: 'POST',
          url: '/formsubmithc/data', // Ganti dengan URL yang benar
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