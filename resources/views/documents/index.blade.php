@extends('layout.app')
@section('breadcrumb')
<h1><small>Tipo de documento</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Tipo de documento</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['type_id'] }}</label>
		{{ Form::select('type_id', \App\Models\DocumentTypes::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->type_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['name'] }}</label>
		{{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['mimetyppe'] }}</label>
		{{ Form::text('mimetyppe', $model->mimetyppe, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['size'] }}</label>
		{{ Form::number('size', $model->size, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['hash'] }}</label>
		{{ Form::text('hash', $model->hash, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("documents/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'type_id' => $model->labels['type_id'],
		'name' => $model->labels['name'],
		'mimetyppe' => $model->labels['mimetyppe'],
		'size' => $model->labels['size'],
		'hash' => $model->labels['hash'],
	]
])
