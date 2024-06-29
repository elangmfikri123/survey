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
              <div class="card-header"><h3>Survei Kepuasan Penanganan Keluhan Sepeda Motor Honda</h3></div>

              <div class="card-body">
                  <div class="form-group">
                      @csrf
                      <div class="form-group" hidden>
                          <label for="nama">Nama Konsumen</label>
                          <input type="text" class="form-control" value="{{ $data->name }}" type="hidden" name="nama" disabled>
                      </div>
                      <input type="hidden" name="customer_id" value="{{ $data->id }}"> <!-- Tambahkan ini untuk menyertakan customer_id -->
                      <p>Terima kasih telah meluangkan waktu untuk mengisi survei ini. 
                        <br>Masukan Bapak/Ibu sangat penting bagi kami untuk terus meningkatkan kualitas layanan kami.
                        <br><br>Hormat kami, 
                        <br><br>PT Astra Honda Motor</p>
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
@endsection