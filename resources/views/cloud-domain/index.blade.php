@extends('layout.app')
@section('breadcrumb')
<h1><small>Extensão por regra</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Extensão por regra</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['point'] }} :</label>
		{{ Form::number('point', $model->point, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['domain'] }} :</label>
		{{ Form::text('domain', $model->domain, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['server'] }} :</label>
		{{ Form::text('server', $model->server, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['port'] }} :</label>
		{{ Form::number('port', $model->port, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['enabled'] }} :</label>
		{{ Form::text('enabled', $model->enabled, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['userId'] }} :</label>
		{{ Form::number('userId', $model->userId, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("cloud-domain/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'point' => $model->labels['point'],
		'domain' => $model->labels['domain'],
		'server' => $model->labels['server'],
		'port' => $model->labels['port'],
		'enabled' => $model->labels['enabled'],
		'userId' => $model->labels['userId'],
	]
])
