<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kategori</title>
	<style>
		table, th, td {
			border: 1px solid black;
		}
	</style>
</head>
<body>

	<h1>CRUD Kategori</h1>

	<form action="{{ route('kategori_surats.store') }}" method="POST">
		@csrf
		<label for="">Nama Kategori :</label>
		<input type="text" name="kategori" required>
		<button type="submit">Tambah Kategori</button>
	</form>

	<br>
	
	<table>
	  <tr>
	    <th>No</th>
	    <th>Nama Kategori</th>
	    <th>Aksi</th>
	  </tr>
	  @php $no = 1; @endphp
	  @foreach ($kategoris as $k)
	  <tr>
	    <td>{{$no++}}</td>
	    <td>{{$k->kategori}}</td>
	    <td>
            <button><a href="{{ route('kategori_surats.edit', $k->id) }}">EDIT</a></button>
	    	<form action="{{ route('kategori_surats.destroy', $k->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
            </form>
	    </td>
	  </tr>
	    @endforeach
	</table>

</body>
</html>