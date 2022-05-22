<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kategori</title>
</head>
<body>

	<h1>Update kategori</h1>

	Nama kategori sekarang : {{$kategori->kategori}}

	<br><hr>
	
	<form action="{{ route('kategori_surats.update', $kategori->id) }}" method="POST">
		@csrf
        @method('PUT')

        <label for="">Nama Kategori</label>
        <input type="text" class="form-control" name="kategori" value="{{ old('kategori', $kategori->kategori) }}" required>
        <button type="submit">Update</button>
        <button><a href="{{route('kategori_surats.index')}}">Kembali ke halaman kategori</a></button>
	</form>

</body>
</html>