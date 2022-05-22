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
            <h1>CRUD Kategori</h1>

	<form action="{{ route('kategori_surats.store') }}" method="POST">
		@csrf
		<label for="">Nama Kategori :</label>
        <!-- <div class="input-group"> -->
    		<input class="" type="text" name="kategori" required>
    		<button class="btn btn-primary" type="submit">Tambah Kategori</button>
        <!-- </div> -->
	</form>

	<br>
	
	<table class="table">
        <thead>
	  <tr>
	    <th scope="col">No</th>
	    <th scope="col">Nama Kategori</th>
	  </tr>
        </thead>
        <tbody>
	  @php $no = 1; @endphp
	  @foreach ($kategoris as $k)
	  <tr>
	    <td scope="row">{{$no++}}</td>
	    <td>{{$k->kategori}}</td>
	    <td>
            <a type="button" class="btn btn-success" href="{{ route('kategori_surats.edit', $k->id) }}">EDIT</a>
	    	<form action="{{ route('kategori_surats.destroy', $k->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
            </form>
	    </td>
	  </tr>
	    @endforeach
        </tbody>
	</table>
        </main>
    </div>
</body>
</html>
