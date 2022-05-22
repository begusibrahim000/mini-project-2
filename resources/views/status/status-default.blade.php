<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Pengajuan Surat</title>
	<style>
		table, th, td {
			border: 1px solid black;
		}
	</style>
</head>
<body>

	<h1>List Pengajuan Surat</h1>

	<table>
	  <tr>
	    <th>No</th>
	    <th>Judul</th>
	    <th>Kategori</th>
	    <th>file_surat</th>
	    <th>keterangan</th>
	    <th>status</th>
	    <th>Aksi</th>
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
	    <td>
	    	<button><a href="{{ route('status.edit', $s->id) }}">EDIT STATUS</a></button>
	    </td>
	  </tr>
	    @endforeach
	</table>
	
</body>
</html>