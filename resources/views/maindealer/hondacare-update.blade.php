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
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
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
                                    <input type="text" class="form-control col-md-7" value="{{ $data->agentcreator }}"
                                        disabled>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Mekanik By</label>
                                    <input type="text" class="form-control col-md-7" value="{{ optional($data->mekanik)->nama }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-row mt-3"> {{-- Row 2 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Created Time</label>
                                    <input type="text" class="form-control col-md-7" value="{{ $data->waktu }}"
                                        disabled>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Tipe Servis</label>
                                    <input type="text" class="form-control col-md-7" value="{{ $data->tipeservis }}"
                                        disabled>
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
                                    <input type="text" class="form-control col-md-7" value="{{ $data->nama }}"
                                        disabled>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Phone</label>
                                    <input type="text" class="form-control col-md-7" value="{{ $data->no_telp }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-row mt-3"> {{-- Row 2 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Email</label>
                                    <input name="email" type="text" class="form-control col-md-7"
                                        value="{{ $data->email }}">
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Phone Alternatif</label>
                                    <input name="no_telp2" type="number" class="form-control col-md-7"
                                        value="{{ $data->no_telp2 }}">
                                </div>
                            </div>
                            <div class="form-row mt-3"> {{-- Row 3 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Provinsi</label>
                                    <input type="text" class="form-control col-md-7" value="{{ $data->provinsi }}"
                                        disabled>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Kecamatan</label>
                                    <input type="text" class="form-control col-md-7" value="{{ $data->kecamatan }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="form-row mt-3"> {{-- Row 4 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Kota/Kabupaten</label>
                                    <input type="text" class="form-control col-md-7" value="{{ $data->kota }}"
                                        disabled>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Alamat</label>
                                    <textarea class="form-control col-md-7" style="height: 38px;" disabled>{{ $data->alamat }} </textarea>
                                </div>
                            </div>
                            <div class="form-row mt-3"> {{-- Row 5 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Model Motor</label>
                                    <input type="text" class="form-control col-md-7" value="{{ $data->smh }}"
                                        disabled>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Nomer Polisi</label>
                                    <input name="nopol" type="text" class="form-control col-md-7"
                                        value="{{ $data->nopol }}">
                                </div>
                            </div>
                            <div class="form-row mt-3"> {{-- Row 5 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Tahun Motor</label>
                                    <input name="tahunmotor" type="text" class="form-control col-md-7"
                                        value="{{ $data->tahunmotor }}">
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Nomor Rangka</label>
                                    <input name="nomerRangka" type="text" class="form-control col-md-7"
                                        value="{{ $data->nomerRangka }}">
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
                                    <input name="jaraktempuh" type="number" class="form-control col-md-7"
                                        value="{{ $data->jaraktempuh }}">
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Status Penyelesaian</label>
                                    <select name="statuspenyelesaian" class="form-control col-md-7">
                                        <option disabled selected>-- Pilih --</option>
                                        <option
                                            value="Selesai di TKP"{{ $data->statuspenyelesaian == 'Selesai di TKP' ? 'selected' : '' }}>
                                            Selesai di TKP</option>
                                        <option
                                            value="Dibawa ke AHASS"{{ $data->statuspenyelesaian == 'Dibawa ke AHASS' ? 'selected' : '' }}>
                                            Dibawa ke AHASS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row mt-3"> {{-- Row 2 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Selesai TKP 1</label>
                                    <select name="tkp1" class="form-control col-md-7">
                                        <option disabled selected>-- Pilih --</option>
                                        @foreach ($penyelesaian as $item)
                                            <option value="{{ $item->deskripsi }}"
                                                {{ $item->deskripsi == $data->tkp1 ? 'selected' : '' }}>
                                                {{ $item->deskripsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Selesai AHASS 1</label>
                                    <select name="ahass1" class="form-control col-md-7">
                                        <option disabled selected>-- Pilih --</option>
                                        @foreach ($penyelesaian as $item)
                                            <option value="{{ $item->deskripsi }}"
                                                {{ $item->deskripsi == $data->ahass1 ? 'selected' : '' }}>
                                                {{ $item->deskripsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row mt-3"> {{-- Row 2 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Selesai TKP 2</label>
                                    <select name="tkp2" class="form-control col-md-7">
                                        <option disabled selected>-- Pilih --</option>
                                        @foreach ($penyelesaian as $item)
                                            <option value="{{ $item->deskripsi }}"
                                                {{ $item->deskripsi == $data->tkp2 ? 'selected' : '' }}>
                                                {{ $item->deskripsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Selesai AHASS 2</label>
                                    <select name="ahass2" class="form-control col-md-7">
                                        <option disabled selected>-- Pilih --</option>
                                        @foreach ($penyelesaian as $item)
                                            <option value="{{ $item->deskripsi }}"
                                                {{ $item->deskripsi == $data->ahass2 ? 'selected' : '' }}>
                                                {{ $item->deskripsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-3"> {{-- Row 2 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Selesai TKP 3</label>
                                    <select name="tkp3" class="form-control col-md-7">
                                        <option disabled selected>-- Pilih --</option>
                                        @foreach ($penyelesaian as $item)
                                            <option value="{{ $item->deskripsi }}"
                                                {{ $item->deskripsi == $data->tkp3 ? 'selected' : '' }}>
                                                {{ $item->deskripsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Selesai AHASS 3</label>
                                    <select name="ahass3" class="form-control col-md-7">
                                        <option disabled selected>-- Pilih --</option>
                                        @foreach ($penyelesaian as $item)
                                            <option value="{{ $item->deskripsi }}"
                                                {{ $item->deskripsi == $data->ahass3 ? 'selected' : '' }}>
                                                {{ $item->deskripsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row mt-3"> {{-- Row 2 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Part Diganti 1</label>
                                    <select name="part1" class="form-control col-md-7 select2-part">
                                        @if ($data->part1)
                                            <option value="{{ $data->part1 }}" selected>{{ $data->part1 }}</option>
                                        @else
                                            <option disabled selected>-- Pilih --</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Harga Part 1</label>
                                    <input name="rupiah1" type="number" class="form-control col-md-7"
                                        value="{{ $data->rupiah1 }}">
                                </div>
                            </div>

                            <div class="form-row mt-3"> {{-- Row 2 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Part Diganti 2</label>
                                    <select name="part2" class="form-control col-md-7 select2-part">
                                        @if ($data->part2)
                                            <option value="{{ $data->part2 }}" selected>{{ $data->part2 }}</option>
                                        @else
                                            <option disabled selected>-- Pilih --</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Harga Part 2</label>
                                    <input name="rupiah2" type="number" class="form-control col-md-7"
                                        value="{{ $data->rupiah2 }}">
                                </div>
                            </div>
                            <div class="form-row mt-3"> {{-- Row 2 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Part Diganti 3</label>
                                    <select name="part3" class="form-control col-md-7 select2-part">
                                        @if ($data->part3)
                                            <option value="{{ $data->part3 }}" selected>{{ $data->part3 }}</option>
                                        @else
                                            <option disabled selected>-- Pilih --</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Harga Part 3</label>
                                    <input name="rupiah3" type="number" class="form-control col-md-7"
                                        value="{{ $data->rupiah3 }}">
                                </div>
                            </div>
                            <div class="form-row mt-3"> {{-- Row 3 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Lokasi AHASS</label>
                                    <input name="namalokasiahass" type="text" class="form-control col-md-7"
                                        value="{{ $data->namalokasiahass }}">
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Alamat AHASS</label>
                                    <input name="lokasiahass" type="text" class="form-control col-md-7"
                                        value="{{ $data->lokasiahass }}">
                                </div>
                            </div>
                            <div class="form-row mt-3"> {{-- Row 3 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Waktu FU Korlap/Mekanik</label>
                                    <input name="waktu_mekanik_call_cust" type="datetime-local"
                                        class="form-control col-md-7" value="{{ $data->waktu_mekanik_call_cust }}">
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Waktu Penyelesaian</label>
                                    <input name="waktuselesai" type="datetime-local" class="form-control col-md-7"
                                        value="{{ $data->waktuselesai }}">
                                </div>
                            </div>

                            <div class="form-row mt-3"> {{-- Row 4 --}}
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Lainnya</label>
                                    <input name="problem" type="text" class="form-control col-md-7"
                                        value="{{ $data->problem }}">
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <label class="col-md-4">Keterangan</label>
                                    <textarea name="keteranganSolving" class="form-control col-md-7" style="height: 38px;">{{ $data->keteranganSolving }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div>
                            <button class="btn btn-danger" type="submit"><i class="fas fa-times"></i> Batal Era</button>
                            <button class="btn btn-warning" type="submit"><i class="fas fa-exclamation-triangle"></i>
                                Not Approve</button>
                        </div>
                        <div>
                            <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Approve</button>
                        </div>
                    </div>
                </div>
                {{-- Form End --}}
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-part').select2({
                ajax: {
                    url: '/suku-cadang/json',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(data) {
                        console.log("Data dari server:", data);
                        return {
                            results: data.map(item => ({
                                id: item.deskripsi,
                                text: item.no_part + " | " + item.deskripsi
                            }))
                        };
                    },
                    cache: true
                },
            });
        });
    </script>
@endsection
