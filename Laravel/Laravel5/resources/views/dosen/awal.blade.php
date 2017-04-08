@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data Dosen</strong>
		<a href="{{url('dosen/tambah') }}" class="btn btn-xs btn-primary pull-right">
			<i class="fa fa-plus"></i>Dosen</a>
			<div class="clearfix"></div>
	</div>
	<table class="table">
		<thead>
		<tr>
			<th>no</th>
			<th>id</th>
			<th>nama</th>
			<th>nip</th>
		</tr>
		</thead>
		<tbody>
			<?php $x=1;?>
			@foreach ($semuaDosen as $dosen)
				<tr>
					<td>{{ $x++ }}</td>
					<td>{{$dosen->nama  or 'nama kosong'}}</td>
					<td>{{ $dosen->nipp or 'nip kosong'}}</td>
					<td>
						<div class="btn-group" role="group">
							<a href="{{url('dosen/edit/'.$dosen->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah">
								<i class="fa fa-pencil"></i>
							</a>

							<a href="{{url('dosen/'.$dosen->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat">
								<i class="fa fa-eye"></i>
							</a>

							<a href="{{url('dosen/hapus/'.$dosen->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus">
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