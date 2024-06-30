@extends('template')
@section('title', 'Survei Kepuasan Penanganan Keluhan Sepeda Motor Honda')
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
              <div class="card-header">
                <div><h3>Survei Kepuasan Penanganan Keluhan Sepeda Motor Honda</h3>
                  <br><strong>Salam Satu HATI, terima kasih kami ucapkan kepada Bapak/Ibu karena telah mempercayakan keluhannya untuk ditangani Pihak Astra Honda Motor dan Jaringannya.</strong>
                  <br><br>Kami sangat menghargai waktu dan kepercayaan yang Bapak/Ibu berikan dan terus berusaha untuk meningkatkan kualitas produk dan layanan Sepeda Motor Honda. Kami memerlukan masukan berharga dan partisipasi Bapak/Ibu dalam <strong> Survey Kepuasan Penanganan Keluhan Sepeda Motor Honda.</strong>
                  <br><br>Survei ini hanya memakan waktu sekitar 5 menit. Partisipasi Bapak/Ibu sangat penting untuk memahami dengan baik apa yang telah kami lakukan dan di area mana kami dapat melakukan peningkatan pelayanan.
                  <br><br><i>Sebagai tanda terima kasih atas partisipasi Bapak/Ibu, kami menyediakan insentif berupa voucher belanja sebesar Rp.100.000 bagi Bapak/Ibu yang beruntung.</i>
                  <br><br>Terima kasih atas waktu dan perhatian Bapak/Ibu. Masukan Anda sangat berarti bagi kami.
                </div>
              </div>


              <div class="card-body">
                  <div class="form-group">
                    <form action="{{ url('/formsubmitca/data') }}" method="post" enctype="multipart/form-data" id="myForm">
                      @csrf
                      <div class="form-group">
                          <label for="nama">Nama Konsumen</label>
                          <input type="text" class="form-control" value="{{ $data->name }}" type="hidden" name="nama" disabled>
                      </div>
                      <input type="hidden" name="customer_id" value="{{ $data->id }}"> <!-- Tambahkan ini untuk menyertakan customer_id -->
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" value="{{ $data->alamat }}" type="hidden" name="alamat" disabled>
                      </div>
                      <div class="form-group">
                        <label for="phone">No Telepon</label>
                        <input type="text" class="form-control" value="{{ $data->phone }}" type="hidden" name="phone" disabled>
                      </div>

                      <div id="pertanyaan_1">
                        <div class="form-group">
                          <label for="jawaban_1"><br>1. Bagaimana Bapak/Ibu menilai kemudahan menyampaikan keluhan? *</label>
                          <select name="jawaban_1" id="jawaban_1" class="form-control selectric">
                          <option disabled selected>-- Pilih --</option>
                          <option value="Sangat Mudah">Sangat Mudah</option>
                          <option value="Mudah">Mudah</option>
                          <option value="Cukup Sulit">Cukup Sulit</option>
                          <option value="Sulit">Sulit</option>
                          <option value="Sangat Sulit">Sangat Sulit</option>
                          </select>
                          <div id="error_jawaban_1" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_1a">
                        <div class="form-group">
                          <label for="jawaban_1a">Jelaskan alasannya</label>
                          <input id="jawaban_1a" type="text" class="form-control" name="jawaban_1a"></input>
                          <div id="error_jawaban_1a" class="text-danger" style="display:none;">Harap Diisi Keterangan.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_2">
                        <div class="form-group">
                          <label for="jawaban_2">2. Berapa lama Bapak/Ibu dihubungi oleh pihak kami (Dealer/AHASS) setelah menyampaikan keluhan? *</label>
                          <select name="jawaban_2" id="jawaban_2" class="form-control selectric">
                            <option disabled selected>-- Pilih --</option>
                              <option value="Sangat Cepat (dalam 24 jam)">Sangat Cepat (dalam 24 jam)</option>
                              <option value="Cepat (1-2 hari)">Cepat (1-2 hari)</option>
                              <option value="Cukup Cepat (3-4 hari">Cukup Cepat (3-4 hari)</option>
                              <option value="Lambat (lebih dari 4 hari)">Lambat (lebih dari 4 hari)</option>
                              </select>
                          <div id="error_jawaban_2" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_3">
                        <div class="form-group">
                          <label for="jawaban_3">3. Seberapa puas Bapak/Ibu dengan respon pertama dari pihak Dealer/AHASS? *</label>
                          <select name="jawaban_3" id="jawaban_3" class="form-control selectric">
                            <option disabled selected>-- Pilih --</option>
                              <option value="Sangat Puas">Sangat Puas</option>
                              <option value="Puas">Puas</option>
                              <option value="Cukup Puas">Cukup Puas</option>
                              <option value="Kurang Puas">Kurang Puas</option>
                              <option value="Tidak Puas Sama Sekali">Tidak Puas Sama Sekali</option>
                          </select>
                          <div id="error_jawaban_3" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_3a" style="display: none;">
                        <div class="form-group">
                          <label for="jawaban_3a">Mohon jelaskan kepada kami, apa alasan Bapak/Ibu menjawab <strong>cukup puas/kurang puas/tidak puas sama sekali</strong> dengan respon pertama dari pihak Dealer/AHASS?</label>
                          <select name="jawaban_3a" id="jawaban_3a" class="form-control selectric">
                            <option disabled selected>-- Pilih --</option>
                              <option value="Respon terlalu lambat">Respon terlalu lambat</option>
                              <option value="Respon tidak relevan dengan keluhan">Respon tidak relevan dengan keluhan</option>
                              <option value="Nada atau sikap yang tidak profesional">Nada atau sikap yang tidak profesional</option>
                              <option value="Kurang empati atau perhatian staff">Kurang empati atau perhatian staff</option>
                              <option value="Tidak ada/salah dalam mengkonfirmasi keluhan yang disampaikan">Tidak ada/salah dalam mengkonfirmasi keluhan yang disampaikan</option>
                              <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                      </div>

                      <div id="pertanyaan_3b" style="display: none;">
                        <div class="form-group">
                          <label for="jawaban_3b">Lainnya</label>
                          <input id="jawaban_3b" type="text" class="form-control" name="jawaban_3b"></input>
                            <div class="invalid-feedback"></div>
                        </div>
                      </div>

                      <div class="card-header">
                        <h4>B. PROSES PENYELESAIAN KELUHAN</h4> 
                      </div>

                        <div id="pertanyaan_4">
                          <div class="form-group">
                            <label for="jawaban_4"><br>4. Bagaimana Bapak menilai keramahan staf yang menangani keluhan Bapak/Ibu? *</label>
                            <select name="jawaban_4" id="jawaban_4" class="form-control selectric">
                            <option disabled selected>-- Pilih --</option>
                            <option value="Sangat Ramah">Sangat Ramah</option>
                            <option value="Ramah">Ramah</option>
                            <option value="Cukup Ramah">Cukup Ramah</option>
                            <option value="Kurang Ramah">Kurang Ramah</option>
                            <option value="Tidak Ramah Sama Sekali">Tidak Ramah Sama Sekali</option>
                            </select>
                            <div id="error_jawaban_4" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                          </div>
                        </div>


                      <div id="pertanyaan_4a">
                        <div class="form-group">
                          <label for="jawaban_4a">Jelaskan alasannya</label>
                            <input id="jawaban_4a" type="text" class="form-control" name="jawaban_4a"></input>
                          <div id="error_jawaban_4a" class="text-danger" style="display:none;">Harap Diisi Keterangan.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_5">
                        <div class="form-group">
                          <label for="jawaban_5">5. Seberapa jelas informasi yang diberikan tentang proses penanganan keluhan Bapak/Ibu? *</label>
                          <select name="jawaban_5" id="jawaban_5" class="form-control selectric">
                            <option disabled selected>-- Pilih --</option>
                            <option value="Sangat Jelas">Sangat Jelas</option>
                            <option value="Jelas">Jelas</option>
                            <option value="Cukup Jelas">Cukup Jelas</option>
                            <option value="Kurang Jelas">Kurang Jelas</option>
                            <option value="Tidak Jelas Sama Sekali">Tidak Jelas Sama Sekali</option>
                          </select>
                          <div id="error_jawaban_5" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_5a">
                        <div class="form-group">
                          <label for="jawaban_5a">Jelaskan alasannya</label>
                            <input id="jawaban_5a" type="text" class="form-control" name="jawaban_5a"></input>
                            <div class="invalid-feedback">
                            </div>
                          <div id="error_jawaban_5a" class="text-danger" style="display:none;">Harap Diisi Keterangan.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_6">
                        <div class="form-group">
                          <label for="jawaban_6">6. Seberapa efektif solusi yang diberikan dalam menyelesaikan keluhan Bapak/Ibu? *</label>
                          <select name="jawaban_6" id="jawaban_6" class="form-control selectric">
                            <option disabled selected>-- Pilih --</option>
                            <option value="Sangat Efektif">Sangat Efektif</option>
                            <option value="Efektif">Efektif</option>
                            <option value="Cukup Efektif">Cukup Efektif</option>
                            <option value="Kurang Efektif">Kurang Efektif</option>
                            <option value="Tidak Efektif Sama Sekali">Tidak Efektif Sama Sekali</option>
                          </select>
                          <div id="error_jawaban_6" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_6a">
                        <div class="form-group">
                          <label for="jawaban_6a">Jelaskan alasannya</label>
                            <input id="jawaban_6a" type="text" class="form-control" name="jawaban_6a"></input>
                            <div class="invalid-feedback">
                            </div>
                          <div id="error_jawaban_6a" class="text-danger" style="display:none;">Harap Diisi Keterangan.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_7">
                        <div class="form-group">
                          <label for="jawaban_7">7. Apakah keluhan Bapak/Ibu ditangani dalam waktu yang wajar? *</label>
                          <select name="jawaban_7" id="jawaban_7" class="form-control selectric">
                            <option disabled selected>-- Pilih --</option>
                            <option value="Sangat Wajar">Sangat Wajar</option>
                            <option value="Wajar">Wajar</option>
                            <option value="Cukup Wajar">Cukup Wajar</option>
                            <option value="Kurang Wajar">Kurang Wajar</option>
                            <option value="Tidak Wajar Sama Sekali">Tidak Wajar Sama Sekali</option>
                          </select>
                          <div id="error_jawaban_7" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_7a">
                        <div class="form-group">
                          <label for="jawaban_7a">Berapa lama waktu yang Bapak/Ibu inginkan (angka dalam hari)?</label>
                            <input id="jawaban_7a" type="number" min="1" class="form-control" name="jawaban_7a"></input>
                            <div class="invalid-feedback">
                            </div>
                          <div id="error_jawaban_7a" class="text-danger" style="display:none;">Harap Diisi Keterangan.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_8">
                        <div class="form-group">
                          <label for="jawaban_8">8. Seberapa puas Bapak/Ibu dengan solusi yang diberikan maupun proses penyelesaian keluhan dari pihak Dealer/AHASS? *</label>
                          <select name="jawaban_8" id="jawaban_8" class="form-control selectric">
                            <option disabled selected>-- Pilih --</option>
                            <option value="Sangat Puas">Sangat Puas</option>
                            <option value="Puas">Puas</option>
                            <option value="Cukup Puas">Cukup Puas</option>
                            <option value="Kurang Puas">Kurang Puas</option>
                            <option value="Tidak Puas Sama Sekali">Tidak Puas Sama Sekali</option>
                          </select>
                          <div id="error_jawaban_8" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                        </div>
                      </div>

                      <div id="pertanyaan_8a" style="display: none;">
                        <div class="form-group">
                          <label for="jawaban_8a">Mohon jelaskan kepada kami, apa alasan Bapak/Ibu menjawab <strong> cukup puas/kurang puas/tidak puas sama sekali</strong> dengan solusi yang diberikan maupun proses penyelesaian dari pihak Dealer/AHASS?</label>
                          <select name="jawaban_8a" id="jawaban_8a" class="form-control selectric">
                            <option disabled selected>-- Pilih --</option>
                              <option value="Respon terlalu lambat">Respon terlalu lambat</option>
                              <option value="Respon tidak relevan dengan keluhan">Respon tidak relevan dengan keluhan</option>
                              <option value="Nada atau sikap yang tidak profesional">Nada atau sikap yang tidak profesional</option>
                              <option value="Kurang empati atau perhatian staff">Kurang empati atau perhatian staff</option>
                              <option value="Tidak ada/salah dalam mengkonfirmasi keluhan yang disampaikan">Tidak ada/salah dalam mengkonfirmasi keluhan yang disampaikan</option>
                              <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                      </div>

                      <div id="pertanyaan_8b" style="display: none;">
                        <div class="form-group">
                          <label for="jawaban_8b">Lainnya</label>
                          <input id="jawaban_8b" type="text" class="form-control" name="jawaban_8b"></input>
                            <div class="invalid-feedback"></div>
                        </div>
                      </div>

                      <div class="card-header">
                        <h4>C. LAIN-LAIN</h4> 
                      </div>

                      <div id="pertanyaan_9">
                        <div class="form-group">
                          <label for="jawaban_9"><br>9. Apakah Bapak/Ibu akan merekomendasikan Sepeda Motor Honda kepada orang lain? *<br>1 Sangat tidak merekomendasikan - 10 Sangat merekomendasikan</label>
                          <br> 
                            <center>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="1">
                              <label class="form-check-label" for="jawaban_9">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="2">
                              <label class="form-check-label" for="jawaban_9">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="3">
                              <label class="form-check-label" for="jawaban_9">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="4">
                              <label class="form-check-label" for="jawaban_9">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="5">
                              <label class="form-check-label" for="jawaban_9">5</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="6">
                              <label class="form-check-label" for="jawaban_9">6</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="7">
                              <label class="form-check-label" for="jawaban_9">7</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="8">
                              <label class="form-check-label" for="jawaban_9">8</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="9">
                              <label class="form-check-label" for="jawaban_9">9</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jawaban_9" id="jawaban_9" value="10" required>
                              <label class="form-check-label" for="jawaban_9">10</label>
                            </div>
                            </center>
                          </select>
                        </div>
                    <div id="error_jawaban_9" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                  </div>

                  <div id="pertanyaan_10">
                    <div class="form-group">
                      <label for="jawaban_10">10. Apakah Bapak/Ibu berencana membeli Sepeda Motor Honda lagi? *</label>
                      <select name="jawaban_10" id="jawaban_10" class="form-control selectric">
                        <option disabled selected>-- Pilih --</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                      <div id="error_jawaban_10" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                    </div>
                  </div>

                  <div id="pertanyaan_10a" style="display: none;">
                    <div class="form-group">
                      <label for="jawaban_10a">Jika ya, maka dalam jangka waktu berapa lama? *</label>
                      <select name="jawaban_10a" id="jawaban_10a" class="form-control selectric">
                        <option disabled selected>-- Pilih --</option>
                        <option value="Kurang dari 2 Minggu">Kurang dari 2 minggu</option>
                        <option value="2 Minggu - 1 Bulan">2 minggu - 1 bulan</option>
                        <option value="1 - 3 Bulan">1 - 3 Bulan</option>
                        <option value="3 - 6 Bulan">3 - 6 Bulan</option>
                        <option value="6 - 12 Bulan">6 - 12 Bulan</option>
                      </select>
                      <div id="error_jawaban_10a" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                    </div>
                  </div>

                  <div id="pertanyaan_11" style="display: none;">
                    <div class="form-group">
                      <label for="jawaban_11">11. Tipe Motor apa yang Bapak/Ibu rencanakan untuk dibeli kembali? *</label>
                      <select name="jawaban_11" id="jawaban_11" class="form-control selectric">
                        <option disabled selected>-- Pilih --</option>
                        <option value="BeAT">BeAT</option>
                        <option value="BeAT Street">BeAT Street</option>
                        <option value="Genio">Genio</option>
                        <option value="Scoopy">Scoopy</option>
                        <option value="Vario 125">Vario 125</option>
                        <option value="Vario 160">Vario 160</option>
                        <option value="Stylo 160">Stylo 160</option>
                        <option value="PCX 160">PCX 160</option>
                        <option value="ADV 160">ADV 160</option>
                        <option value="Forza">Forza</option>
                        <option value="CB150 Verza">CB150 Verza</option>
                        <option value="Sonic 150R">Sonic 150R</option>
                        <option value="CB150R Streetfire">CB150R Streetfire</option>
                        <option value="CB150X">CB150X</option>
                        <option value="CRF150L">CRF150L</option>
                        <option value="CBR 150R">CBR 150R</option>
                        <option value="CBR 250RR">CBR 250RR</option>
                        <option value="CRF250L">CRF250L</option>
                        <option value="ST125 DAX">ST125 DAX</option>
                        <option value="Monkey">Monkey</option>
                        <option value="CRF 250 Rally">CRF 250 Rally</option>
                        <option value="Supra X 125 FI">Supra X 125 FI</option>
                        <option value="GTR 150">GTR 150</option>
                        <option value="Supercub C125">Supercub C125</option>
                        <option value="CT125">CT125</option>
                        <option value="Revo">Revo</option>
                        <option value="Honda EM1 e:">Honda EM1 e:</option>
                        <option value="Honda EM1 e: Plus">Honda EM1 e: Plus</option>
                        <option value="Honda CB650R">Honda CB650R</option>
                        <option value="Honda CBR1000RR-R">Honda CBR1000RR-R</option>
                        <option value="XL750 Transalp">XL750 Transalp</option>
                        <option value="Honda CB500X">Honda CB500X</option>
                        <option value="Honda CRF1100L Africa Twin Adventure Sports">Honda CRF1100L Africa Twin Adventure Sports</option>
                        <option value="Honda Rebel">Honda Rebel</option> 
                        <option value="Honda Gold Wing 1800">Honda Gold Wing 1800</option>
                      </select>
                      <div id="error_jawaban_11" class="text-danger" style="display:none;">Harap pilih opsi.</div>
                    </div>
                  </div>

                  <table class="table table-md">
                    <td><input class="form-check-input" name="setuju" type="checkbox" id="setuju" value="Ya">
                      <i>*Data-data pribadi Anda hanya akan digunakan untuk keperluan administrasi dan analisa internal PT Astra Honda Motor</i>
                      <br><i>*Mengizinkan PT Astra Honda Motor untuk menggunakan informasi di atas dan menghubungi Saya melalui email dan/atau telepon atau sarana komunikasi pribadi lainnya untuk kegiatan pelayanan kepada customer</i>
                      <br><i>*Kerahasiaan data-data pribadi Anda adalah prioritas kami</i>
                      </input>
                    </td>
                </table>

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
      Copyright &copy; PT Astra Honda Motor
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
  $(document).ready(function() {

    $('#jawaban_1').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_1').toggle(isError);
    $('#jawaban_1').prop('required', isError);
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
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_2').toggle(isError);
    $('#jawaban_2').prop('required', isError);
  });

    $('#jawaban_3').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue === 'Cukup Puas' || selectedValue === 'Kurang Puas' || selectedValue === 'Tidak Puas Sama Sekali') {
      $('#pertanyaan_3a').show();
      $('#error_jawaban_3').hide(); // Sembunyikan pesan kesalahan
      $('#jawaban_3a').val(null);
    } else {
      $('#pertanyaan_3a, #pertanyaan_3b').hide();
      $('#error_jawaban_3').hide();
      $('#jawaban_3a, #jawaban_3b').val(null);
      // Munculkan pesan kesalahan jika tidak ada opsi yang dipilih
      if (!val) {
        $('#error_jawaban_3').show();
      }
    }
  });

  $('#jawaban_3a').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue === 'Lainnya') {
      $('#pertanyaan_3b').show();
      $('#error_jawaban_3a').hide(); // Sembunyikan pesan kesalahan
      $('#jawaban_3b').val(null);
    } else {
      $('#pertanyaan_3b').hide();
      $('#error_jawaban_3a').hide();
      $('#jawaban_3b').val(null);
      // Munculkan pesan kesalahan jika tidak ada opsi yang dipilih
      if (!val) {
        $('#error_jawaban_3a').show();
      }
    }
  });

  $('#jawaban_4').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_4').toggle(isError);
    $('#jawaban_4').prop('required', isError);
  });

  $('#jawaban_4a').on('input', function() {
    var inputValue = $(this).val();
    if (inputValue) {
      $('#error_jawaban_4a').hide(); // Sembunyikan pesan kesalahan jika ada input
    } else {
      $('#error_jawaban_4a').show(); // Tampilkan pesan kesalahan jika input kosong
    }
  });

  $('#jawaban_5').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_5').toggle(isError);
    $('#jawaban_5').prop('required', isError);
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

  $('#jawaban_6a').on('input', function() {
    var inputValue = $(this).val();
    if (inputValue) {
      $('#error_jawaban_6a').hide(); // Sembunyikan pesan kesalahan jika ada input
    } else {
      $('#error_jawaban_6a').show(); // Tampilkan pesan kesalahan jika input kosong
    }
  });

  $('#jawaban_7').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_7').toggle(isError);
    $('#jawaban_7').prop('required', isError);
  });

  $('#jawaban_7a').on('input', function() {
    var inputValue = $(this).val();
    if (inputValue) {
      $('#error_jawaban_7a').hide(); // Sembunyikan pesan kesalahan jika ada input
    } else {
      $('#error_jawaban_7a').show(); // Tampilkan pesan kesalahan jika input kosong
    }
  });

  $('#jawaban_8').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue === 'Cukup Puas' || selectedValue === 'Kurang Puas' || selectedValue === 'Tidak Puas Sama Sekali') {
      $('#pertanyaan_8a').show();
      $('#error_jawaban_8').hide(); // Sembunyikan pesan kesalahan
      $('#jawaban_8a').val(null);
    } else {
      $('#pertanyaan_8a, #pertanyaan_8b').hide();
      $('#error_jawaban_8').hide();
      $('#jawaban_8a').val(null);
      // Munculkan pesan kesalahan jika tidak ada opsi yang dipilih
      if (!val) {
        $('#error_jawaban_8').show();
      }
    }
  });

  $('#jawaban_8a').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue === 'Lainnya') {
      $('#pertanyaan_8b').show();
      $('#error_jawaban_8a').hide(); // Sembunyikan pesan kesalahan
      $('#jawaban_8b').val(null);
    } else {
      $('#pertanyaan_8b').hide();
      $('#error_jawaban_8a').hide();
      $('#jawaban_8b').val(null);
      // Munculkan pesan kesalahan jika tidak ada opsi yang dipilih
      if (!val) {
        $('#error_jawaban_8b').show();
      }
    }
  });

  $('#jawaban_8a').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    $('#error_jawaban_8a').toggle(isError);
    $('#jawaban_8a').prop('required', isError);
  });

  $('input[name="jawaban_9"]').on('change', function() {
        $('#error_jawaban_9').hide(); // Sembunyikan pesan kesalahan jika ada input
    });

    $('#jawaban_10').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue === 'Ya') {
      $('#pertanyaan_10a, #pertanyaan_11').show(); // No 10a Muncul
      $('#error_jawaban_10').hide(); // Sembunyikan pesan kesalahan
      $('#jawaban_10a, #jawaban_11').val(null); 
    } else {
      $('#pertanyaan_10a, #pertanyaan_11').hide();
      $('#error_jawaban_10').hide();
      $('#jawaban_10a, #jawaban_11').val(null);
      // Munculkan pesan kesalahan jika tidak ada opsi yang dipilih
      if (!val) {
        $('#error_jawaban_10').show();
      }
    }
  });

  $('#jawaban_10a').change(function() {
    var val = $(this).val();
    var isError = val === null || val === '-- Pilih --';
    
    $('#error_jawaban_10a').toggle(isError);
    $('#jawaban_10a').prop('required', isError);
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
    if ($('#pertanyaan_1').is(':visible')) {
      if (!$('#jawaban_1').val()) {
        isValid = false;
        $('#error_jawaban_1').show();
      }
    }

    if ($('#pertanyaan_1a').is(':visible')) {
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
    if ($('#pertanyaan_3a').is(':visible')) {
      if (!$('#jawaban_3a').val()) {
        isValid = false;
        $('#error_jawaban_3a').show();
      }
    }

    if ($('#pertanyaan_4').is(':visible')) {
      if (!$('#jawaban_4').val()) {
        isValid = false;
        $('#error_jawaban_4').show();
      }
    }
    if ($('#pertanyaan_4a').is(':visible')) {
      if (!$('#jawaban_4a').val()) {
        isValid = false;
        $('#error_jawaban_4a').show();
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

    if ($('#pertanyaan_6a').is(':visible')) {
      if (!$('#jawaban_6a').val()) {
        isValid = false;
        $('#error_jawaban_6a').show();
      }
    }

    if ($('#pertanyaan_7').is(':visible')) {
      if (!$('#jawaban_7').val()) {
        isValid = false;
        $('#error_jawaban_7').show();
      }
    }

    if ($('#pertanyaan_7a').is(':visible')) {
      if (!$('#jawaban_7a').val()) {
        isValid = false;
        $('#error_jawaban_7a').show();
      }
    }

    if ($('#pertanyaan_8').is(':visible')) {
      if (!$('#jawaban_8').val()) {
        isValid = false;
        $('#error_jawaban_8').show();
      }
    }

    if ($('#pertanyaan_8a').is(':visible')) {
      if (!$('#jawaban_8a').val()) {
        isValid = false;
        $('#error_jawaban_8a').show();
      }
    }

    if (!$('input[name="jawaban_9"]:checked').val()) {
            event.preventDefault();
            $('#error_jawaban_9').show(); // Tampilkan pesan kesalahan jika tidak ada input yang dipilih
        } else {
            $('#error_jawaban_9').hide(); // Sembunyikan pesan kesalahan jika ada input yang dipilih
        }


    if ($('#pertanyaan_10').is(':visible')) {
      if (!$('#jawaban_10').val()) {
        isValid = false;
        $('#error_jawaban_10').show();
      }
    }

    if ($('#pertanyaan_10a').is(':visible')) {
      if (!$('#jawaban_10a').val()) {
        isValid = false;
        $('#error_jawaban_10a').show();
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