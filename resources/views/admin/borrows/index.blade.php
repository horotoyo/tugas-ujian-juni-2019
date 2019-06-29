@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Peminjaman
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Data Peminjaman</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <a href="{{ route('borrows.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th width="5%">No</th>
              <th>Peminjam</th>
              <th>Buku</th>
              <th>Durasi</th>
              <th>Tgl Pinjam</th>
              <th>Tgl Kembali</th>
              <th>Staff Perpus</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('script')
  <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script type="text/javascript">
    var table;
    $(function() {
        table = $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{$ajax}}',
            order: [[0,'desc']],
            columns: [
                { data: 'id', searchable: true, orderable: true},
                { data: 'member_id', searchable: true, orderable: true},
                { data: 'book_id', searchable: true, orderable: true},
                { data: 'time_period', searchable: true, orderable: true},
                { data: 'borrow_date', searchable: true, orderable: true},
                { data: 'return_date', searchable: true, orderable: true},
                { data: 'staff_name', searchable: true, orderable: true},
                { data: 'action', searchable: true, orderable: true},
            ],
            columnDefs: [{
              "targets": 0,
              "searchable": false,
              "orderable": false,
              "data": null,
              "title": 'No',
              "render": function (data, type, full, meta) {
                  return meta.settings._iDisplayStart + meta.row + 1; 
              }
            }],
        });
    });
  </script>
@endsection