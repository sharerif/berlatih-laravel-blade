@extends('adminlte.master')

@section('content')
<div class="m-4">
    <h3> {{$pertanyaan->judul}} </h3>
    <p> {{$pertanyaan->isi}} </p>
</div>
@endsection