<div class="form-group">
	<label class="col-sm-2 control-label" id="nama">Nama</label>
	<div class="col-sm-10">
	{!! form::text('nama',null,['class'=>'form-control','id'=>'nama','placeholder'=>"nama"]) !!}
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" id="nim">Nim</label>
	<div class="col-sm-10">
		{!! form::text('nim',null,['class'=>'form-control','id'=>'nim','placeholder'=>"Nim"]) !!}
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" id="alamat">alamat</label>
	<div class="col-sm-10">
		{!! form::textarea('alamat',null,['class'=>'form-control','id'=>'alamat','placeholder'=>"alamat"]) !!}
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label">username</label>
	<div class="col-sm-10">
		{!! form::text('username',null,['class'=>'form-control','placeholder'=>"username"]) !!}
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label">password</label>
	<div class="col-sm-10">
		{!! form::password('password',['class'=>'form-control','placeholder'=>"password"]) !!}
	</div>
</div>
