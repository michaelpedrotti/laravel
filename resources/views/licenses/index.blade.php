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
		<label class="control-label">{{ $model->labels['product_id'] }} :</label>
		{{ Form::select('product_id', \App\Models\Products::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->product_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['type_id'] }} :</label>
		{{ Form::select('type_id', \App\Models\LicenseTypes::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->type_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['user_id'] }} :</label>
		{{ Form::select('user_id', \App\Models\Users::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->user_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['length'] }} :</label>
		{{ Form::number('length', $model->length, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['expiration'] }} :</label>
		{{ Form::text('expiration', $model->expiration, ['placeholder' => 'dd/mm/aaaa', 'data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control maskDate date-picker']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['hash'] }} :</label>
		{{ Form::text('hash', $model->hash, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("licenses/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'product_id' => $model->labels['product_id'],
		'type_id' => $model->labels['type_id'],
		'user_id' => $model->labels['user_id'],
		'length' => $model->labels['length'],
		'expiration' => $model->labels['expiration'],
		'hash' => $model->labels['hash'],
	]
])
