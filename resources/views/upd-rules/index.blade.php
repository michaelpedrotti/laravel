@extends('layout.app')
@section('breadcrumb')
<h1><small>@lang('Assinaturas de SPAM')</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> @lang('Home')</a></li>
	<li>@lang('Extreme Update')</li>
	<li class="active">@lang('Assinaturas de SPAM')</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['type'] }}</label>
		{{ Form::select('type', ["body" => "body", "header" => "header", "uri" => "uri", "rowbody" => "rowbody", "meta" => "meta"], '', ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['name'] }}</label>
		{{ Form::text('name', $model->name, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['value'] }}</label>
		{{ Form::text('value', $model->value, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("upd-rules/index"),
	'permission' => 'UPDRULES',
	'columns' => [
		'id' => $model->labels['id'],
		'type' => $model->labels['type'],
		'name' => $model->labels['name'],
		'value' => $model->labels['value'],
		'created_at' => __('Criado'),
		'updated_at' => __('Atualizado'),
	]
])
