@extends('layout.app')
@section('breadcrumb')
<!-- breadcrumb.begin -->
<h1><small>Dominios na núvem</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li>Dominios na núvem</li>
	<li class="active">Listagem</li>
</ol>
<!-- breadcrumb.end -->
@stop
@section('search')

<div class="col-sm-6">
	<div class="form-body {{ $errors->first("point", "has-error") }}">
		<label class="control-label">{{ $model->labels['point'] }}:</label>
		{{ Form::number('point', $model->point, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body {{ $errors->first("domain", "has-error") }}">
		<label class="control-label">{{ $model->labels['domain'] }}:</label>
		{{ Form::text('domain', $model->domain, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body {{ $errors->first("server", "has-error") }}">
		<label class="control-label">{{ $model->labels['server'] }}:</label>
		{{ Form::text('server', $model->server, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body {{ $errors->first("port", "has-error") }}">
		<label class="control-label">{{ $model->labels['port'] }}:</label>
		{{ Form::number('port', $model->port, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body {{ $errors->first("enabled", "has-error") }}">
		<label class="control-label">{{ $model->labels['enabled'] }}  :</label>
		{{ Form::text('enabled', $model->enabled, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body {{ $errors->first("userId", "has-error") }}">
		<label class="control-label">{{ $model->labels['userId'] }}:</label>
		{{ Form::number('userId', $model->userId, ['class' => 'form-control', 'placeholder' => '']) }}
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
