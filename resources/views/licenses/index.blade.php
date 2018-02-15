@extends('layout.app')
@section('breadcrumb')
<h1><small>Licença</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Licença</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['product_id'] }}</label>
		{{ Form::select('product_id', app_fetch('Products', 'name', 'id'), $model->product_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['type_id'] }}</label>
		{{ Form::select('type_id', app_fetch('LicenseTypes', 'name', 'id'), $model->type_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['customer_id'] }}</label>
		{{ Form::select('customer_id', app_fetch('Clients', 'name', 'id'), $model->customer_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("licenses/index"),
	'permission' => 'LICENSES',
	'columns' => [
		'id' => $model->labels['id'],
		'product_id' => $model->labels['product_id'],
		'type_id' => $model->labels['type_id'],
		'customer_id' => $model->labels['customer_id'],
		'expiration' => $model->labels['expiration'],
	]
])
