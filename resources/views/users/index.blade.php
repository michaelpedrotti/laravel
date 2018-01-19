@extends('layout.app')
@section('breadcrumb')
<h1><small>Usuário</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Usuário</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['name'] }} :</label>
		{{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['email'] }} :</label>
		{{ Form::text('email', $model->email, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>   
@stop
@include('layout.partials.datatable', [
	'url' => url("users/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'name' => $model->labels['name'],
		'email' => $model->labels['email']
	]
])
