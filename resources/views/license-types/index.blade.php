@extends('layout.app')
@section('breadcrumb')
<h1><small>Tipo de licença</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Tipo de licença</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['name'] }}</label>
		{{ Form::text('name', $model->name, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("license-types/index"),
	'permission' => 'LICENSETYPES',
	'columns' => [
		'id' => $model->labels['id'],
		'name' => $model->labels['name'],
		'product_id' => $model->labels['product_id'],
	]
])
