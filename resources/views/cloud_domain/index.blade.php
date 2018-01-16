@extends('layout.app')
@section('breadcrumb')
<h1><small>Dominios na núvem</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li>Dominios na núvem</li>
	<li class="active">Listagem</li>
</ol>
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
