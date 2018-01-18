@extends('layout.app')
@section('breadcrumb')
<h1><small>Permissão do Perfil</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Permissão do Perfil</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['acl_id'] }} :</label>
		{{ Form::select('acl_id', \App\Models\Acls::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->acl_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['permission_id'] }} :</label>
		{{ Form::select('permission_id', \App\Models\Permissions::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->permission_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
   
@stop
@include('layout.partials.datatable', [
	'url' => url("acl-permissions/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'acl_id' => $model->labels['acl_id'],
		'permission_id' => $model->labels['permission_id'],
	]
])
