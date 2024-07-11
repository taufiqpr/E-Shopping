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
        <form action="{{ route('alternatif.update',['id' => $alternatif->id] )}}" method="POST">
          @csrf
          @method('put')
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Alternatif</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="Masukan Kode Akternatif">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $alternatif->nama }}" placeholder="Masukan Kode Alternatif">
                    @error('nama')
                      <small>{{ $message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">C1</label>
                    <input type="text" name="C1" value="{{ $alternatif->C1 }}" class="form-control" id="C1" placeholder="Enter Nama">
                    @error('C1')
                      <small>{{ $message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">C2</label>
                    <input type="text" name="C2" value="{{ $alternatif->C2 }}" class="form-control" id="C2" placeholder="Enter Bobot">
                    @error('C2')
                      <small>{{ $message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">C3</label>
                    <input type="text" name="C3" value="{{ $alternatif->C3 }}" class="form-control" id="C3" placeholder="Enter Bobot">
                    @error('bobot')
                      <small>{{ $message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">C4</label>
                    <input type="text" name="C4" value="{{ $alternatif->C4 }}" class="form-control" id="C4" placeholder="Enter Bobot">
                    @error('C4')
                      <small>{{ $message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">C5</label>
                    <input type="text" name="C5" value="{{ $alternatif->C5 }}" class="form-control" id="C5" placeholder="Enter Bobot">
                    @error('C5')
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