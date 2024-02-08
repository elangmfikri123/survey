@extends('layout.template')
@section('title', 'Awareness Survey')
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
                <h4>Detail Data Honda Care</h4>
              </div>
              <div class="card-body">
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Data Konsumen</div>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="15%">ID Konsumen</th>
                      <td data-width="30%">: {{ $item->nik }}</td>
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
                          <th>Sales Date</th>
                          <td>: {{ $item->sales_date }}</td>
                        </tr>
                        <tr>
                          <th>Alamat Konsumen</th>
                          <td>: {{ $item->alamat }} , {{ $item->kelurahan }}, {{ $item->kecamatan }} </td>
                          <th>Main Dealer</th>
                          <td>: {{ $item->main_dealer }}</td>
                        </tr>
                        <tr>
                          <th>Provinsi</th>
                          <td>: {{ $item->provinsi }}</td>
                          <th>Dealer Code</th>
                          <td>: {{ $item->dealer_code }}</td>
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
                          <td>Jika ada keluhan mengenai produk/layanan motor honda, kemana dan bagaimana Anda menyampaikan keluhan tersebut ?</td>
                          <td>{{ $form->jawaban_1 }}</td>
                        </tr>
                        <tr>
                          <td>1.A</td>
                          <td>Jawaban Lainnya</td>
                          <td>{{ $form->jawaban_1a }}</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Bapak/ibu jika ada keluhan mengenai motor honda ada gak keinginan menyampaikan ke AHM sebagai produsen ? </td>
                          <td>{{ $form->jawaban_2 }}</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Bapak/ibu apa mengetahui Astra Honda Motor memiliki layanan contact center untuk keluhan konsumen ?</td>
                          <td>{{ $form->jawaban_3 }}</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Layanan Contact Center Astra Honda Motor yang Anda ketahui ?(bisa pilih lebih dari 1)</td>
                          <td>{{ $form->jawaban_4 }}</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Dari mana anda mengetahui layanan contact center ?</td>
                          <td>{{ $form->jawaban_5 }}</td>
                        </tr>
                        <tr>
                          <td>5.A</td>
                          <td>Jawaban Lainnya</td>
                          <td>{{ $form->jawaban_5a }}</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Promosi mengenai contact center</td>
                          <td>{{ $form->jawaban_6 }}</td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>Jika ada keluhan mengenai produk/layanan motor honda apakah berkenan menghubungi contact center ?</td>
                          <td>{{ $form->jawaban_7 }}</td>
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