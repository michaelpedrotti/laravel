@extends('layout.app')
@section('breadcrumb')
<h1><small>Endereço</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Endereço</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['user_id'] }}</label>
		{{ Form::select('user_id', \App\Models\Users::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->user_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['cep'] }}</label>
		{{ Form::text('cep', $model->cep, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['address'] }}</label>
		{{ Form::text('address', $model->address, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['number'] }}</label>
		{{ Form::text('number', $model->number, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['city'] }}</label>
		{{ Form::text('city', $model->city, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['state'] }}</label>
		{{ Form::text('state', $model->state, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("address/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'user_id' => $model->labels['user_id'],
		'cep' => $model->labels['cep'],
		'address' => $model->labels['address'],
		'number' => $model->labels['number'],
		'city' => $model->labels['city'],
		'state' => $model->labels['state'],
	]
])
