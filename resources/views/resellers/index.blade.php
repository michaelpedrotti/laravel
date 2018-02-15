@extends('layout.app')
@section('breadcrumb')
<h1><small>Revendedor</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Revendedor</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">Distribuidor</label>
		{{ Form::text('distributor', '', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">Revendedor</label>
		{{ Form::text('name', '', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['cnpj'] }}</label>
		{{ Form::text('cnpj', $model->cnpj, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control cnpj', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("resellers/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'name' => 'Revendedor',
		'distributor' => $model->labels['distributor_id'],
		'cnpj' => $model->labels['cnpj'],
	]
])