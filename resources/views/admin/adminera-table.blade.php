@extends('layout.template')
@section('title', 'Data User')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>DataTables</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Modules</a></div>
          <div class="breadcrumb-item">DataTables</div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Honda Care</h4>
              </div>
              <div class="card-body">

                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="myTable" cellspacing="0" width="100%">
                    <thead>                                 
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tiket ICC</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">No HP</th>
                        <th class="text-center">Motor</th>
                        <th class="text-center">Type Servis</th>
                        <th class="text-center">Penyelesaian</th>
                        <th class="text-center">MD</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody> 
                    </tbody>
                  </table>
                      <!-- Tambahkan script DataTables -->
                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
                   <script>
                  $(document).ready(function() {
                  $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url("get-era/data") }}',
                    searching: true, // Menampilkan fitur pencarian
                    lengthChange: true, // Menampilkan fitur pengaturan jumlah data per halaman
                    columns: [
                    { data: 'id_form', name: 'id_form' },
                    { data: 'tiketich', name: 'tiketich' },
                    { data: 'nama', name: 'nama' },
                    { data: 'no_telp', name: 'no_telp' },
                    { data: 'smh', name: 'smh' },
                    { data: 'tipeservis', name: 'tipeservis' },
                    { data: 'statuspenyelesaian', name: 'statuspenyelesaian' },
                    { data: 'kode', name: 'kode' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                   ],
                    });
                  });
                </script>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection