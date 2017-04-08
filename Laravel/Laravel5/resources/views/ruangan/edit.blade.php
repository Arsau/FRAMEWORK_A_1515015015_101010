@extends('master')
@section('container')
<div class="panel panel-info">
	<div class="panel-heading">
		<strong><a href="{{url('ruangan')}}">
		<i class="fa text-default fa-chevron-left"></i>
		</a>Perbraui data Ruangan</strong>
	</div>
	{!! Form::model($ruangan, ['url' =>'ruangan/edit/'.$ruangan->id,'class'=>'form-horizontal'])!!}
       			 @include('ruangan.form.form')
		<div style="width: 100%;text-align: right;">
			<button class="btn btn-info">
				<i class="fa fa-save"></i>Perbarui
			</button>
			<button type="reset" class="btn btn-danger">
				<i class="fa fa-undo"></i>Ulangi
			</button>
		</div>
		{!!form::close()!!}
		</div>
@stop