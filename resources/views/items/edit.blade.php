@extends('adminlte.master')

@section('content')
<div class="m-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Pertanyaan {{$pertanyaan->id}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="/pertanyaan/{{$pertanyaan->id}}" method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="form-group">
                    <label for="judul">Judul Pertanyaan</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $pertanyaan->judul )}}" placeholder="Masukan Judul Pertanyaan">
                    @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi">Isi Pertanyaan</label>
                    <input type="textarea" class="form-control" name="isi" id="isi" value="{{ old('isi', $pertanyaan->isi )}}" placeholder="Masukan Isi Pertanyaan">
                    @error('isi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection