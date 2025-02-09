@extends('layout.template')
@section('title', 'Update Data')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Update</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">DataTables</div>
                </div>
            </div>
            {{-- Form Start --}}
            <h2 class="section-title">Tiket ICC ID #{{ $data->tiketich }}</h2>
            <p class="section-lead">
                Perbarui Data Penanganan Honda Care.
            </p>

            <form id="update-form" action="" method="POST">
                @csrf
                @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>Header</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse1" class="btn btn-icon btn-info" href="#"><i
                                class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse1">
                    <div class="card-body">
                        <div class="form-row"> {{-- Row 1 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Created By</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->agentcreator }}" disabled>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Mekanik By</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->id_mekanik }}" disabled>
                            </div>
                        </div>

                        <div class="form-row mt-3"> {{-- Row 2 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Created Time</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->waktu}}" disabled>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Tipe Servis</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->tipeservis }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4>Customer & Motorcyle Data</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse">
                    <div class="card-body">
                        <div class="form-row"> {{-- Row 1 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Nama Konsumen</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->nama }}" disabled>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Phone</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->no_telp }}" disabled>
                            </div>
                        </div>

                        <div class="form-row mt-3"> {{-- Row 2 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Email</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->email }}">
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Phone Alternatif</label>
                                <input type="number" class="form-control col-md-7" value="{{ $data->no_telp2 }}">
                            </div>
                        </div>

                        <div class="form-row mt-3"> {{-- Row 3 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Provinsi</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->provinsi }}" disabled>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Kecamatan</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->kecamatan }}" disabled>
                            </div>
                        </div>

                        <div class="form-row mt-3"> {{-- Row 4 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Kota/Kabupaten</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->kota }}" disabled>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Alamat</label>
                                <textarea class="form-control col-md-7" style="height: 38px;" disabled>{{ $data->alamat }} </textarea>
                            </div>
                        </div>
                        <div class="form-row mt-3"> {{-- Row 5 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Model Motor</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->smh }}" disabled>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Nomer Polisi</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->nopol }}">
                            </div>
                        </div>
                        <div class="form-row mt-3"> {{-- Row 5 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Tahun Motor</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->tahunmotor }}">
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Nomor Rangka</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->nomerRangka }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Work Activity</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse2" class="btn btn-icon btn-info" href="#"><i
                                class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse2">
                    <div class="card-body">
                        <div class="form-row"> {{-- Row 1 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Jarak Tempuh</label>
                                <input type="number" class="form-control col-md-7" value="{{ $data->jaraktempuh }}">
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Status Penyelesaian</label>
                                <select class="form-control col-md-7">
                                    <option disabled selected>-- Pilih --</option>
                                    <option value="Selesai di TKP">Selesai di TKP</option>
                                    <option value="Dibawa ke AHASS">Dibawa ke AHASS</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mt-3"> {{-- Row 2 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Selesai TKP 1</label>
                                <select class="form-control col-md-7">
                                    <option disabled selected>-- Pilih --</option>
                                </select>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Selesai AHASS 1</label>
                                <select class="form-control col-md-7">
                                    <option disabled selected>-- Pilih --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mt-3"> {{-- Row 2 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Selesai TKP 2</label>
                                <select class="form-control col-md-7">
                                    <option disabled selected>-- Pilih --</option>
                                </select>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Selesai AHASS 2</label>
                                <select class="form-control col-md-7">
                                    <option disabled selected>-- Pilih --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mt-3"> {{-- Row 2 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Selesai TKP 3</label>
                                <select class="form-control col-md-7">
                                    <option disabled selected>-- Pilih --</option>
                                </select>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Selesai AHASS 3</label>
                                <select class="form-control col-md-7">
                                    <option disabled selected>-- Pilih --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mt-3"> {{-- Row 2 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Part Diganti 1</label>
                                <select class="form-control col-md-7 select2">
                                    <option disabled selected>-- Pilih --</option>
                                </select>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Harga Part 1</label>
                                <input type="number" class="form-control col-md-7">
                            </div>
                        </div>

                        <div class="form-row mt-3"> {{-- Row 2 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Part Diganti 2</label>
                                <select class="form-control col-md-7 select2">
                                    <option disabled selected>-- Pilih --</option>
                                </select>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Harga Part 2</label>
                                <input type="number" class="form-control col-md-7">
                            </div>
                        </div>
                        <div class="form-row mt-3"> {{-- Row 2 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Part Diganti 3</label>
                                <select class="form-control col-md-7 select2">
                                    <option disabled selected>-- Pilih --</option>
                                </select>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Harga Part 3</label>
                                <input type="number" class="form-control col-md-7">
                            </div>
                        </div>
                        <div class="form-row mt-3"> {{-- Row 3 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Lokasi AHASS</label>
                                <input type="text" class="form-control col-md-7">
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Alamat AHASS</label>
                                <input type="text" class="form-control col-md-7">
                            </div>
                        </div>
                        <div class="form-row mt-3"> {{-- Row 3 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Waktu Ingin Ditangani</label>
                                <input type="datetime-local" class="form-control col-md-7">
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Waktu Penanganan</label>
                                <input type="datetime-local" class="form-control col-md-7">
                            </div>
                        </div>

                        <div class="form-row mt-3"> {{-- Row 4 --}}
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Lainnya</label>
                                <input type="text" class="form-control col-md-7" value="{{ $data->problem }}">
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="col-md-4">Keterangan</label>
                                <textarea class="form-control col-md-7" style="height: 38px;">{{ $data->keteranganSolving }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </div>
            {{-- Form End --}}
        </section>
    </div>
@endsection
