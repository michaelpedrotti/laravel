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
		{{ Form::text('reseller', '', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">Cliente</label>
		{{ Form::text('name', '', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['cnpj'] }}</label>
		{{ Form::text('cnpj', '', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control cnpj', 'placeholder' => '']) }}
	</div>
</div>
   
@stop
@section('javascript')
<script type="text/javascript">

$(document).ready(function(){
	
	//$( "table" ).delegate( "td", "click", function() {

	
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
	'columns' => $columns
])
