<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/app.css') }}">
</head>
<body>

	<div class="container">
	<div class="card">
	<div class="card-body">

	<h2  class="text-center">www.malasngoding.com</h2>
	<h3>Data Pegawai</h3>

	<p>Cari Data Pegawai :</p>
	<div class="form-group">
					
	</div>
	<form action="pegawai/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form>

	<a href="pegawai/tambah"> + Tambah Pegawai Baru</a>
	
	<br/>
	<br/>

	<table class="table table-bordered">
		<tr>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Umur</th>
			<th>Alamat</th>
			<th>Opsi</th>
		</tr>
		@foreach($pegawai as $p)
		<tr>
			<td>{{ $p->pegawai_nama }}</td>
			<td>{{ $p->pegawai_jabatan }}</td>
			<td>{{ $p->pegawai_umur }}</td>
			<td>{{ $p->pegawai_alamat }}</td>
			<td>
							<a class="btn btn-warning btn-sm" href="pegawai/edit/{{ $p->pegawai_id }}">Edit</a>
							<a class="btn btn-danger btn-sm" href="pegawai/hapus/{{ $p->pegawai_id }}">Hapus</a>
						</td>
		</tr>
		@endforeach
	</table>

		<br/>
	Halaman : {{ $pegawai->currentPage() }} <br/>
	Jumlah Data : {{ $pegawai->total() }} <br/>
	Data Per Halaman : {{ $pegawai->perPage() }} <br/>


	{{ $pegawai->links() }}

</div>
</div>
</div>


</body>
</html>