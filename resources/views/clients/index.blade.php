@extends('layout.app')
@section('breadcrumb')
<h1><small>Cliente</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Cliente</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['user_id'] }} :</label>
		{{ Form::select('user_id', \App\Models\Users::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->user_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['reseller_id'] }} :</label>
		{{ Form::select('reseller_id', \App\Models\Resellers::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->reseller_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['cnpj'] }} :</label>
		{{ Form::text('cnpj', $model->cnpj, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("clients/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'user_id' => $model->labels['user_id'],
		'reseller_id' => $model->labels['reseller_id'],
		'cnpj' => $model->labels['cnpj'],
	]
])
