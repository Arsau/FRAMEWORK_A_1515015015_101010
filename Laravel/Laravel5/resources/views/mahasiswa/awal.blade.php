@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data mahasiswa</strong>
		<a href="{{url('mahasiswa/tambah') }}" class="btn btn-xs btn-primary pull-right">
			<i class="fa fa-plus"></i>mahasiswa</a>
			<div class="clearfix"></div>
	</div>
	<table class="table">
		<thead>
		<tr>
			<th>no</th>
			<th>id</th>
			<th>nama</th>
			<th>nim</th>
		</tr>
		</thead>
		<tbody>
			<?php $x=1;?>
			@foreach ($semuaMahasiswa as $mahasiswa)
				<tr>
					<td>{{ $x++ }}</td>
					<td>{{$mahasiswa->nama  or 'nama kosong'}}</td>
					<td>{{ $mahasiswa->nim or 'nip kosong'}}</td>
					<td>
						<div class="btn-group" role="group">
							<a href="{{url('mahasiswa/edit/'.$mahasiswa->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah">
								<i class="fa fa-pencil"></i>
							</a>

							<a href="{{url('mahasiswa/'.$mahasiswa->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat">
								<i class="fa fa-eye"></i>
							</a>

							<a href="{{url('mahasiswa/hapus/'.$mahasiswa->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus">
								<i class="fa fa-premove"></i>
							</a>
						</div>

						</td>
						</tr>
						@endforeach	
				</tr>
		</tbody>
	</table>
</div>
@stop