@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
      Edit Peminjaman
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="{{ route('borrows.index') }}">Peminjaman</a></li>
    <li class="active">Edit Peminjaman</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <a href="{{ route('borrows.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>

            {!! form_start($form) !!}
          <div class="box-body">
              {!! form_rows($form, $fields = ['member_id'], $option = ['selected' => $borrow->member_id]) !!}
              {!! form_rows($form, $fields = ['book_id'], $option = ['selected' => $borrow->book_id]) !!}
              {!! form_rows($form, $fields = ['staff_name'], $option = ['value' => $borrow->staff_name]) !!}
              {!! form_rows($form, $fields = ['time_period'], $option = ['value' => $borrow->time_period]) !!}
              {!! form_rows($form, $fields = ['borrow_date'], $option = ['value' => $borrow->borrow_date]) !!}
              {!! form_rows($form, $fields = ['return_date'], $option = ['value' => $borrow->return_date]) !!}
              {!! form_rows($form, $fields = ['status'], $option = ['value' => $borrow->status]) !!}
              {!! form_rows($form, $fields = ['note'], $option = ['value' => $borrow->note]) !!}
          </div>
          <div class="box-footer">
              {!! form_rows($form, $fields = ['submit']) !!}
          </div>
            {!! form_end($form, false) !!}

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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@endsection