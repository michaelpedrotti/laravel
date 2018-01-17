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
		<label class="control-label">{{ $model->labels['to_address'] }} :</label>
		{{ Form::text('to_address', $model->to_address, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['from_address'] }} :</label>
		{{ Form::text('from_address', $model->from_address, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['timestamp'] }} :</label>
		{{ Form::text('timestamp', $model->timestamp, ['placeholder' => 'dd/mm/aaaa', 'data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control maskDate date-picker']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("extension-rule/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'to_address' => $model->labels['to_address'],
		'from_address' => $model->labels['from_address'],
		'timestamp' => $model->labels['timestamp'],
	]
])
