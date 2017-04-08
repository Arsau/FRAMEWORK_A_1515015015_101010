@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data Ruangan</strong>
		<a href="{{url('ruangan/tambah') }}" class="btn btn-xs btn-primary pull-right">
			<i class="fa fa-plus"></i>Ruangan</a>
			<div class="clearfix"></div>
	</div>
	<table class="table">
		<thead>
		<tr>
			<th>no</th>
			<th>id</th>
			<th>title</th>
					</tr>
		</thead>
		<tbody>
			<?php $x=1;?>
			@foreach ($data as $ruangan)
				<tr>
					<td>{{ $x++ }}</td>
					<td>{{ $ruangan->id or 'id kosong'}}</td>
					<td>{{ $ruangan->title or 'title kosong'}}</td>
					<td>
						<div class="btn-group" role="group">
							<a href="{{url('ruangan/edit/'.$ruangan->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah">
								<i class="fa fa-pencil"></i>
							</a>

							<a href="{{url('ruangan/'.$ruangan->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat">
								<i class="fa fa-eye"></i>
							</a>

							<a href="{{url('ruangan/hapus/'.$ruangan->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus">
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