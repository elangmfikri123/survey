@extends('layout.template')
@section('title', 'CSAT Honda Care Survey')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Detail Data</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Modules</a></div>
          <div class="breadcrumb-item">Data Tables</div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Detail Data CSAT Honda Care</h4>
              </div>
              <div class="card-body">
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Data Konsumen</div>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="15%">No Tiket</th>
                      <td data-width="30%">: {{ $item->tiketicc }}</td>
                          <th data-width="15%">Frame Number</th>
                          <td data-width="30%">: {{ $item->frame_no }}</td>
                        </tr>
                        <tr>
                          <th>Nama Konsumen</th>
                          <td>: {{ $item->name }}</td>
                          <th>Motorcycle</th>
                          <td>: {{ $item->motor }}</td>
                        </tr>
                        <tr>
                          <th>No Handphone</th>
                          <td>: {{ $item->phone }}</td>
                          <th>Waktu Input</th>
                          <td>: {{ $item->waktu }}</td>
                        </tr>
                        <tr>
                          <th>Alamat Konsumen</th>
                          <td>: {{ $item->alamat }}</td>
                          <th>Main Dealer</th>
                          <td>: {{ $item->main_dealer }}</td>
                        </tr>
                        <tr>
                          <th>Provinsi</th>
                          <td>: {{ $item->provinsi }}</td>
                          <th>Nama AHASS</th>
                          <td>: {{ $item->nama_ahass }}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
              </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Jawaban Customer</div>
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-hover table-md">
                        <tr>
                          <th data-width="20">No</th>
                          <th data-width="65%">Pertanyaan</th>
                          <th data-width="50%">Jawaban</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Apakah sudah pernah menggunakan fasilitas HONDA CARE atau pertolongan darurat di jalan ?</td>
                          <td>{{ $form->jawaban_1 }}</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Darimana Bapak/Ibu mengetahui adanya fasilitas HONDA CARE atau pertolongan motor di jalan ?</td>
                          <td>{{ $form->jawaban_2 }}</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Berapa kali Anda harus menghubungi nomer telp.layanan HONDA CARE untuk mendapatkan respon ?</td>
                          <td>{{ $form->jawaban_3 }}</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Berapa lama armada/mekanik Honda CARE tiba di lokasi Bapak/Ibu ?</td>
                          <td>{{ $form->jawaban_4 }}</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Sudah puaskah dg waktu tunggu mekanik sampai di lokasi Bapak/Ibu ?</td>
                          <td>{{ $form->jawaban_5 }}</td>
                        </tr>
                        <tr>
                          <td>5.A</td>
                          <td>Jika dirasa TIDAK PUAS, idealnya berapa lama waktu tunggu bagi Bapak/Ibu ?</td>
                          <td>{{ $form->jawaban_5a }}</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Apakah tindakan sementara dari mekanik Honda CARE sudah membantu Bapak/Ibu saat membutuhkan pertolongan darurat di jalan ?</td>
                          <td>{{ $form->jawaban_6 }}</td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>Apakah mekanik HONDA CARE menawarkan pembelian suku cadang lain ?</td>
                          <td>{{ $form->jawaban_7 }}</td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>Apakah mekanik HONDA CARE menawarkan/menginfokan/promosi produk Honda ?</td>
                          <td>{{ $form->jawaban_8 }}</td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td>Secara keseluruhan sudah puaskah dengan pelayanan dari HONDA CARE ?</td>
                          <td>{{ $form->jawaban_9 }}</td>
                        </tr>
                        <tr>
                          <td>9.A</td>
                          <td>Jika dirasa TIDAK PUAS, mengapa dan alasannya ?</td>
                          <td>{{ $form->jawaban_10 }}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection