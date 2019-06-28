@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
      Tambah Kategori    
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="{{ route('categories.index') }}">Kategori</a></li>
    <li class="active">Tambah Kategori</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <a href="{{ route('categories.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>

        <form method="post" action="{{ route('categories.store') }}">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="name">Kategori Buku</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Kategori">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Submit</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection