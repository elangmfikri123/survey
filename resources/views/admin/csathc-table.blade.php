@extends('layout.template')
@section('title', 'CSAT Honda Care Survey')
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
                <h4>Data Survey CSAT Honda Care</h4>
              </div>
              <div class="card-body">

                <form action="{{ url('/import-csathc') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <input type="file" name="file" class="form-control-sm" accept=".xlsx, .csv">
                  <button type="submit" class="btn btn-success">Import</button>
                </div>
                </form>

                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="myTable" cellspacing="0" width="100%">
                    <thead>                                 
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Uuid</th>
                        <th class="text-center">Tiket ICC</th>
                        <th class="text-center">Customer</th>
                        <th class="text-center">No Handphone</th>
                        <th class="text-center">Motor</th>
                        <th class="text-center">MD</th>
                        <th class="text-center">Waktu</th>
                        <th class="text-center">Status</th>
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
                    ajax: '{{ url("/survey-csathc/data") }}',
                    searching: true, // Menampilkan fitur pencarian
                    lengthChange: true, // Menampilkan fitur pengaturan jumlah data per halaman
                    columns: [
                    { data: 'id', name: 'id' },
                    { data: 'uuid', name: 'uuid' },
                    { data: 'tiketicc', name: 'tiketicc' },
                    { data: 'name', name: 'name' },
                    { data: 'phone', name: 'phone' },
                    { data: 'motor', name: 'motor' },
                    { data: 'main_dealer', name: 'main_dealer' },
                    // Menggunakan fungsi render untuk memformat kolom waktu
                    {
                      data: 'waktu',
                      name: 'waktu',
                      render: function(data) {
                      // Menggunakan substring untuk mengambil tanggal (10 karakter pertama)
                        return data.substring(0, 10);
                      }
                    },
                    { data: 'status', name: 'status', orderable: true, searchable: true },
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