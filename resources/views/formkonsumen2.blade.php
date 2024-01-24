<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Honda &mdash; Survey</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header"><h4>Survey Awareness Contact Center</h4></div>

              <div class="card-body">
                  <div class="form-group">
                    <form action="{{ url('/formsubmit/data') }}" method="post" enctype="multipart/form-data" id="myForm">
                      @csrf
                      <div class="form-group">
                          <label for="nama">Nama Konsumen</label>
                          <input type="text" class="form-control" value="{{ $data->name }}" type="hidden" name="nama">
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
                      <option value="Tidak disampaikan">Other</option>
                    </select>
                  </div>

                  <div id="pertanyaan_1" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_1">Jawaban Lainnya</label>
                    <input id="jawaban_1" type="text" class="form-control" name="jawaban_1">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  </div>

                  <div id="pertanyaan_2_3" style="display: none;">
                  <div class="form-group">
                    <label for="jawaban_2">2. Bapak/ibu jika ada keluhan mengenai motor honda ada gak keinginan menyampaikan ke AHM sebagai produsen ?</label>
                    <select name="jawaban_2" id="jawaban_2" class="form-control selectric" required>
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="jawaban_3">3. Bapak/ibu apa mengetahui Astra Honda Motor memiliki layanan contact center untuk keluhan konsumen ?</label>
                    <select name="jawaban_3" id="jawaban_3" class="form-control selectric" required>
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="jawaban_4">4. Layanan Contact Center Astra Honda Motor yang Anda ketahui ? (Bisa pilih lebih dari 1)</label>
                    <select name="jawaban_4[]" id="jawaban_4" class="form-control selectric" multiple>
                      <option disabled selected>-- Pilih --</option>
                      <option value="Tidak Tahu">Tidak Tahu</option>
                      <option value="Call 1500-989">Call 1500-989</option>
                      <option value="IG @astrahondacare_id">IG @astrahondacare_id</option>
                      <option value="FB Astra Honda Care">FB Astra Honda Care</option>
                      <option value="Twitter @astrahondacare">Twitter @astrahondacare</option>
                      <option value="WA : 0811-9500-989">WA : 0811-9500-989</option>
                      <option value="SMS : 0811-9500-989">SMS : 0811-9500-989</option>
                      <option value="Email : customercare@astra-honda.com">Email : customercare@astra-honda.com</option>
                      <option value="Web Astra-Honda.com">Web Astra-Honda.com</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="jawaban_5">5. Dari mana anda mengetahui layanan contact center ?</label>
                    <select name="jawaban_5" id="jawaban_5" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Petugas dealer">Petugas dealer</option>
                      <option value="Social Media">Social Media</option>
                      <option value="Buku Servis dan Garansi">Buku Servis dan Garansi</option>
                      <option value="Teman / Keluarga">Teman / Keluarga</option>
                      <option value="Lainnya, sebutkan">Lainnya, sebutkan ….</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jawaban_6">Promosi mengenai contact center</label>
                  </div>
                  <div class="form-group">
                    <label for="jawaban_7">7. Jika ada keluhan mengenai produk/layanan motor honda apakah berkenan menghubungi contact center ?</label>
                    <select name="jawaban_7" id="jawaban_7" class="form-control selectric">
                      <option disabled selected>-- Pilih --</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>

                  {{-- <div class="form-group">
                    <label for="jawaban_1">Jawaban Lainnya</label>
                    <input id="jawaban_1" type="text" class="form-control" name="jawaban_1">
                    <div class="invalid-feedback">
                    </div>
                  </div> --}}

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">Mengizinkan PT Astra Honda Motor untuk menggunakan informasi di atas dan menghubungi Saya melalui email dan/atau telepon atau sarana komunikasi pribadi lainnya untuk kegiatan pelayanan kepada customer.</label>
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
      var pertanyaan2_3Div = $('#pertanyaan_2_3');

      // Adjust the condition to show pertanyaan_2_3Div when the value is not "Contact Center Astra Honda Motor"
      if (value !== "Contact Center Astra Honda Motor") {
        pertanyaan2_3Div.show();
      } else {
        pertanyaan2_3Div.hide();
      }
    }

    // Panggil fungsi pada saat halaman dimuat
    handleJawaban1Change();

    // Panggil fungsi pada peristiwa perubahan pada jawaban pertanyaan 1
    $('#jawaban_1').change(handleJawaban1Change);

          // Tangkap submit form
          $('#myForm').submit(function(e) {
              e.preventDefault(); // Mencegah formulir dikirim dengan cara biasa
              // Lakukan pengiriman formulir dengan Ajax
              $.ajax({
                  type: 'POST',
                  url: '/formsubmit/data', // Ganti dengan URL yang benar
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

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/auth-register.js') }}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>