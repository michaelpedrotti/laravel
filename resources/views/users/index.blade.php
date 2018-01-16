@extends('layout.app')
@section('breadcrumb')
<h1><small>Usuários</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li>Usuários</li>
	<li class="active">Listagem</li>
</ol>
@stop
@include('layout.partials.datatable', [
	'url' => url("users/index"),
	'columns' => [
		'id' => 'ID', 
		'name' => 'Nome', 
		'email' => 'E-mail'
	]
])