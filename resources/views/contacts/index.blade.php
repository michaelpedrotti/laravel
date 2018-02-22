@extends('layout.app')
@section('breadcrumb')
<h1><small>{{ empty($ownerName) ? 'Contatos' : 'Contatos de '.$ownerName }}</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Contato</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['type'] }}</label>
		{{ Form::select('type', $model->getTypes(), '', ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['name'] }}</label>
		{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['email'] }}</label>
		{{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
@stop
@include('layout.partials.datatable', [
	'url' => url($url),
	'allowAll' => true,
	'columns' => [
		'id' => $model->labels['id'],
		'type' => $model->labels['type'],
		'name' => $model->labels['name'],
		'email' => $model->labels['email'],
	]
])
