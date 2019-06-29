@extends('layouts.app')

@section('title', 'Tambah Member')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
      Tambah Kategori    
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="{{ route('members.index') }}">Kategori</a></li>
    <li class="active">Tambah Kategori</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <a href="{{ route('members.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>

            {!! form_start($form) !!}
          <div class="box-body">
              {!! form_until($form, 'phone'); !!}
          </div>
          <div class="box-footer">
              {!! form_row($form->submit) !!}
          </div>
            {!! form_end($form, $renderRest = true) !!}

      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection