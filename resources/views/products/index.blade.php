@extends('layout.app')
@section('breadcrumb')
<h1><small>Produto</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Produto</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['name'] }}</label>
		{{ Form::text('name', $model->name, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['version'] }}</label>
		{{ Form::text('version', $model->version, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
@stop
@include('layout.partials.datatable', [
	'url' => url("products/index"),
	'permission' => 'PRODUCTS',
	'columns' => [
		'id' => $model->labels['id'],
		'name' => $model->labels['name'],
		'version' => $model->labels['version']
	]
])
