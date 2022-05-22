<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pengajuan Surat</title>
	<style>
		table, th, td {
			border: 1px solid black;
		}
	</style>
</head>
<body>

	<h1>Pengajuan Surat</h1>

	<form action="{{ route('surats.store') }}" enctype="multipart/form-data" method="POST">
		@csrf
		<label for="">Judul :</label>
		<input type="text" name="judul" required>
		<br>
		<label for="">Kategori :</label>
		<select name="kategori">
			@foreach ($kategori_surats as $ks)
		 		<option value="{{$ks->kategori}}">{{$ks->kategori}}</option>
			@endforeach
		</select>
		
		<br>
		<label for="">File Surat :</label>
		<input type="file" name="file_surat" required>
		<br>
		<label for="">Keterangan :</label>
		<textarea type="text" name="keterangan" required></textarea>
		<br>
		<button type="submit">Tambah Kategori</button>
	</form>

	<br>

	<table>
	  <tr>
	    <th>No</th>
	    <th>Judul</th>
	    <th>Kategori</th>
	    <th>file_surat</th>
	    <th>keterangan</th>
	    <th>status</th>
	  </tr>
	  @php $no = 1; @endphp
	  @foreach ($surats as $s)
	  <tr>
	    <td>{{$no++}}</td>
	    <td>{{$s->judul}}</td>
	    <td>{{$s->kategori}}</td>
	    <td>{{$s->file_surat}}</td>
	    <td>{{$s->keterangan}}</td>
	    <td>{{$s->status}}</td>
	  </tr>
	    @endforeach
	</table>
	
</body>
</html>