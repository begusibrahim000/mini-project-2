<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" aria-current="page" href="{{route('kategori_surats.index')}}">Kategori Surat</a>
                        <a class="nav-link" href="{{route('surats.index')}}">Pengajuan Surat</a>
                        <a class="nav-link" href="{{route('status.index')}}">Edit Status Surat</a>
                        <a class="nav-link" href="{{route('daftar.akun')}}">Daftar</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif -->
<!-- 
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            <h1>List Pengajuan Surat</h1>

			<table class="table">
                <thead>
			  <tr>
			    <th scope="col">No</th>
			    <th scope="col">Judul</th>
			    <th scope="col">Kategori</th>
			    <th scope="col">file surat</th>
			    <th scope="col">keterangan</th>
			    <th scope="col">status</th>
			    <th scope="col">Aksi</th>
			  </tr>
                </thead>
                <tbody>
			  @php $no = 1; @endphp
			  @foreach ($surats as $s)
			  <tr>
			    <td scope="row">{{$no++}}</td>
			    <td>{{$s->judul}}</td>
			    <td>{{$s->kategori}}</td>
			    <td>
                    {{$s->file_surat}}
                    <br>
                    <img src="{{asset('hasil-file-surat/' . $s->file_surat)}}" class="img-thumbnail" width="100" height="100" alt="File tidak bisa di reload">   
                </td>
			    <td>{{$s->keterangan}}</td>
			    <td>{{$s->status}}</td>
			    <td>
			    	<a class="btn btn-success" href="{{ route('status.edit', $s->id) }}">EDIT STATUS</a>
			    </td>
			  </tr>
			    @endforeach
                </tbody>
			</table>
        </main>
    </div>
</body>
</html>
