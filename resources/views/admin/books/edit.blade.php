@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
      Edit Buku    
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="{{ route('books.index') }}">Buku</a></li>
    <li class="active">Edit Buku</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <a href="{{ route('books.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>

            {!! form_start($form) !!}
          <div class="box-body">
              {!! form_rows($form, $fields = ['isbn'], $option = ['value' => $book->isbn]) !!}
              {!! form_rows($form, $fields = ['title'], $option = ['value' => $book->title]) !!}
              {!! form_rows($form, $fields = ['category_id'], $option = ['selected' => $book->category_id]) !!}
              {!! form_rows($form, $fields = ['description'], $option = ['value' => $book->description]) !!}
              {!! form_rows($form, $fields = ['author'], $option = ['value' => $book->author]) !!}
              {!! form_rows($form, $fields = ['publisher'], $option = ['value' => $book->publisher]) !!}
              {!! form_rows($form, $fields = ['print'], $option = ['value' => $book->print]) !!}
              {!! form_rows($form, $fields = ['date_rilies'], $option = ['value' => $book->date_rilies]) !!}
              {!! form_rows($form, $fields = ['place_rilies'], $option = ['value' => $book->place_rilies]) !!}
              {!! form_rows($form, $fields = ['quantity'], $option = ['value' => $book->quantity]) !!}
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

@section('script')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@endsection