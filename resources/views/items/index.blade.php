@extends('adminlte.master')

@section('content')
<div class="m-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold mt-2 ml-1">DAFTAR PERTANYAAN</h3>
            <a href="/pertanyaan/create" class="btn btn-primary float-right card-title">Buat Pertanyaan Baru</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th style="width: 40px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pertanyaan as $key => $post)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $post->judul }} </td>
                            <td> {{ $post->isi }} </td>
                            <td style="display:flex">
                                <a href="/pertanyaan/{{$post->id}}" class="btn btn-info btn-sm m-1">Show</a>
                                <a href="/pertanyaan/{{$post->id}}/edit" class="btn btn-default btn-sm m-1">Edit</a>
                                <form action="/pertanyaan/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm m-1" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" align="center"> NULL </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection