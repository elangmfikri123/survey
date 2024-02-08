@extends('layout.template')
@section('title', 'Survey Contact Center')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Export Awareness Honda Care</h1>
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
                            <h4>Export Template Survey Awareness Honda Care</h4>
                        </div>
                        <div class="card-body">
                          <form class="form-inline" action="{{ url('/export-urlhc') }}" method="get">
                            @csrf
                            <label class="sr-only" for="start_date">Start Date</label>
                            <input type="date" class="form-control mb-2 mr-sm-2" id="start_date" name="start_date" placeholder="Start Date">
                            <label class="sr-only" for="end_date">End Date</label>
                            <input type="date" class="form-control mb-2 mr-sm-2" id="end_date" name="end_date" placeholder="End Date">
                            <button type="submit" class="btn btn-success mb-2 mr-sm-2" id="exportButton">Export</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Export Hasil Survey Awareness Honda Care</h4>
                </div>
                <div class="card-body">
                    <form class="form-inline" action="{{ url('/export-awarenesshasilhc') }}" method="get">
                        @csrf
                        <label class="sr-only" for="start_date_result">Start Date</label>
                        <input type="date" class="form-control mb-2 mr-sm-2" id="start_date_result" name="start_date_result" placeholder="Start Date">
                        <label class="sr-only" for="end_date">End Date</label>
                        <input type="date" class="form-control mb-2 mr-sm-2" id="end_date_result" name="end_date_result" placeholder="End Date">
                        <button type="submit" class="btn btn-success mb-2 mr-sm-2" id="expButton">Export</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
<script>
  $(document).ready(function () {
      $('#exportButton').on('click', function () {
          var startDate = $('#start_date').val();
          var endDate = $('#end_date').val();
          if (startDate && endDate) {
          $.ajax({
              url: '/export-urlhc',
              type: 'get',
              data: {
                  start_date: startDate,
                  end_date: endDate
              },
              success: function () {
                  // Redirect or handle success as needed
                  alert('Export URL Awareness Contact Center Success Uhuuuuuyyyyy!');
              },
              error: function (xhr, status, error) {
                  // Handle error
                  console.error(error);
              }
          });
        } else {
            alert('Silakan pilih kedua tanggal mulai dan tanggal akhir.');
        }
      });

    $('#expButton').click(function () {
        var startDate = $('#start_date_result').val();
        var endDate = $('#start_date_result').val();

        // Validasi jika kedua tanggal mulai dan tanggal akhir telah dipilih
        if (startDate && endDate) {
            // Lakukan permintaan AJAX ke rute ekspor
            $.ajax({
                url: '/export-awarenesshasilhc',
                type: 'GET',
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                success: function (response) {
                    // Redirect ke tautan unduhan
                    window.location.href = response.filename;
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            alert('Silakan pilih kedua tanggal mulai dan tanggal akhir.');
        }
    });
});
</script>
@endsection