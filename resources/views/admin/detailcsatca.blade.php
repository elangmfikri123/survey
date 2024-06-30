@extends('layout.template')
@section('title', 'Survey Customer Assistance')
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
                <h4>Detail Data CSAT CA</h4>
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
                          <th>Motorcycle</th>
                          <td>: {{ $item->motor }}</td>
                        </tr>
                        <tr>
                          <th>Nama Konsumen</th>
                          <td>: {{ $item->name }}</td>
                          <th>Main Dealer</th>
                          <td>: {{ $item->main_dealer }}</td>
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
                          <td>Bagaimana Bapak/Ibu menilai kemudahan menyampaikan keluhan?</td>
                          <td>{{ $form->jawaban_1 }}</td>
                        </tr>
                        <tr>
                          <td>1a</td>
                          <td>Jelaskan alasannya</td>
                          <td>{{ $form->jawaban_1a }}</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Berapa lama Bapak/Ibu dihubungi oleh pihak kami (Dealer/AHASS) setelah menyampaikan keluhan?</td>
                          <td>{{ $form->jawaban_2 }}</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Seberapa puas Bapak/Ibu dengan respon pertama dari pihak Dealer/AHASS?</td>
                          <td>{{ $form->jawaban_3 }}</td>
                        </tr>
                        <tr>
                          <td>3a</td>
                          <td>Mohon jelaskan kepada kami, apa alasan Bapak/Ibu menjawab cukup puas/kurang puas/tidak puas sama sekali dengan respon pertama dari pihak Dealer/AHASS?</td>
                          <td>{{ $form->jawaban_3a }}</td>
                        </tr>
                        <tr>
                          <td>3b</td>
                          <td>Lainnya</td>
                          <td>{{ $form->jawaban_3b }}</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Bagaimana Bapak menilai keramahan staf yang menangani keluhan Bapak/Ibu?</td>
                          <td>{{ $form->jawaban_4 }}</td>
                        </tr>
                        <tr>
                          <td>4a</td>
                          <td>Jelaskan alasannya</td>
                          <td>{{ $form->jawaban_4a }}</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Seberapa jelas informasi yang diberikan tentang proses penanganan keluhan Bapak/Ibu?</td>
                          <td>{{ $form->jawaban_5 }}</td>
                        </tr>
                        <tr>
                          <td>5a</td>
                          <td>Jelaskan alasannya</td>
                          <td>{{ $form->jawaban_5a }}</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Seberapa efektif solusi yang diberikan dalam menyelesaikan keluhan Bapak/Ibu?</td>
                          <td>{{ $form->jawaban_6 }}</td>
                        </tr>
                        <tr>
                          <td>6a</td>
                          <td>Jelaskan alasannya</td>
                          <td>{{ $form->jawaban_6a }}</td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>Apakah keluhan Bapak/Ibu ditangani dalam waktu yang wajar?</td>
                          <td>{{ $form->jawaban_7 }}</td>
                        </tr>
                        <tr>
                          <td>7a</td>
                          <td>Berapa lama waktu yang Bapak/Ibu inginkan (angka dalam hari)?</td>
                          <td>{{ $form->jawaban_7a }}</td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>Seberapa puas Bapak/Ibu dengan solusi yang diberikan maupun proses penyelesaian keluhan dari pihak Dealer/AHASS?</td>
                          <td>{{ $form->jawaban_8 }}</td>
                        </tr>
                        <tr>
                          <td>8a</td>
                          <td>Mohon jelaskan kepada kami, apa alasan Bapak/Ibu menjawab cukup puas/kurang puas/tidak puas sama sekali dengan solusi yang diberikan maupun proses penyelesaian dari pihak Dealer/AHASS?</td>
                          <td>{{ $form->jawaban_8a }}</td>
                        </tr>
                        <tr>
                          <td>8b</td>
                          <td>Lainnya</td>
                          <td>{{ $form->jawaban_8b }}</td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td>Apakah Bapak/Ibu akan merekomendasikan Sepeda Motor Honda kepada orang lain?</td>
                          <td>{{ $form->jawaban_9}}</td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td>Apakah Bapak/Ibu berencana membeli Sepeda Motor Honda lagi?</td>
                          <td>{{ $form->jawaban_10 }}</td>
                        </tr>
                        <tr>
                          <td>10a</td>
                          <td>Jika ya, maka dalam jangka waktu berapa lama?</td>
                          <td>{{ $form->jawaban_10a }}</td>
                        </tr>
                        <tr>
                          <td>11</td>
                          <td>Tipe Motor apa yang Bapak/Ibu rencanakan untuk dibeli kembali?</td>
                          <td>{{ $form->jawaban_11 }}</td>
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