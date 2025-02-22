@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kriteria</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Kriteria</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <section class="content">
      <div class="container-fluid">
        <form action="{{ route('kriteria.update',['id' => $kriteria->id] )}}" method="POST">
          @csrf
          @method('put')
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Kriteria</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="Masukan Kode Akternatif">Kode</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="kode" value="{{ $kriteria->kode }}" placeholder="Masukan Kode Alternatif">
                    @error('kode')
                      <small>{{ $message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" value="{{ $kriteria->nama }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama">
                    @error('nama')
                      <small>{{ $message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Bobot</label>
                    <input type="text" name="bobot" value="{{ $kriteria->bobot }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Bobot">
                    @error('bobot')
                      <small>{{ $message}}</small>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection