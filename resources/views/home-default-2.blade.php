@extends('layouts.app')

@section('content')
<div>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{route('kategori_surats.index')}}">Kategori Surat</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('surats.index')}}">Pengajuan Surat</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('status.index')}}">Edit Status Surat</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('daftar.akun')}}">Daftar</a>
    </li>
</ul>
</div>
@endsection
