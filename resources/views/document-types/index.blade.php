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
		<label class="control-label">{{ $model->labels['name'] }}</label>
		{{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("document-types/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'name' => $model->labels['name'],
	]
])
