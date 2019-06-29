@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
      Edit Kategori    
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="{{ route('members.index') }}">Kategori</a></li>
    <li class="active">Edit Kategori</li>
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
              {!! form_rows($form, $fields = ['name'], $option = ['value' => $member->name]) !!}
              {!! form_rows($form, $fields = ['address'], $option = ['value' => $member->address]) !!}
              {!! form_rows($form, $fields = ['birth_place'], $option = ['value' => $member->birth_place]) !!}
              {!! form_rows($form, $fields = ['birth_date'], $option = ['value' => $member->birth_date]) !!}
              {!! form_rows($form, $fields = ['email'], $option = ['value' => $member->email]) !!}
              {!! form_rows($form, $fields = ['phone'], $option = ['value' => $member->phone]) !!}
          </div>
          <div class="box-footer">
              {!! form_rows($form, $fields = ['submit']) !!}
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