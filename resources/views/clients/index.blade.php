@extends('layout.app')
@section('breadcrumb')
<h1><small>Cliente</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Cliente</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">Revendedor</label>
		{{ Form::text('reseller', '', ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">Cliente</label>
		{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['cnpj'] }}</label>
		{{ Form::text('cnpj', '', ['class' => 'form-control cnpj', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@section('toolbar')
<span class="btn-lg"></span>
<a href="javascript:void(0)" title="@lang('Contatos')" data-action="contact" class="btn btn-primary">
	<i class="fa fa-book"></i>
</a>
@stop
@section('javascript')
<script type="text/javascript">

$(document).ready(function(){
	
	$('button[data-action=contact], a[data-action=contact]').click(function(){
		
		var id = APP.Crud.getSelected($(this));
		
		if(!id) return false;
		
		window.location = APP.base_url + 'contacts/clients/' + id;
	});
	
	$('#modal-primary').delegate('select[name=distributor_id]', 'change', function(){
		
		APP.loadCombo($('select[name=reseller_id]'), 'Resellers', {
			distributor_id:$(this).val()
		});
	});
});
</script>
@append
@include('layout.partials.datatable', [
	'url' => url("clients/index"),
	'permission' => 'CLIENTS',
	'columns' => $columns,
	'order' => ['user_id' => 'asc']
])
