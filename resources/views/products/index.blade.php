@extends('layout.app')
@section('breadcrumb')
<h1><small>Produto</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Produto</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['name'] }}</label>
		{{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['version'] }}</label>
		{{ Form::text('version', $model->version, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
@stop
@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
	
	//$('#modal-primary').delegate('select[name=distributor_id]', 'change', function(){
	$('#modal-primary').delegate('button[data-action=json-add], a[data-action=json-add]', 'click', function(){
	
		// fieldset data-target="#jsontable"
		
		var button = $(this);
		var form = button.closest('form');
		var table = $(button.attr('data-table'));
		var field = $(button.attr('data-store'));
		var html = '<tr>';
		var rows = JSON.parse(field.val() || []);
		var row = {};
		
		$.each(form.serializeArray(), function(index, obj){
			row[obj.name] = obj.value;
			html += '<td>' + obj.value + '</td>';
		});
		
		form.get(0).reset();
		
		rows.push(row);
		
		field.val(JSON.stringify(rows));
		
		html += '<td>';
		html += '<a href="javascript:void(0)" data-action="json-rem" data-store="' + button.attr('data-store') +'" class="btn btn-xs btn-danger">';
		html += '<i class="fa fa-remove"></i></a>';
		html += '</td>';
		html += '</tr>'; 
		
		table.find('tbody').append(html);		
	});
	
	$('#modal-primary').delegate('button[data-action=json-rem], a[data-action=json-rem]', 'click', function(){
		
		var button = $(this);
		var field = $(button.attr('data-store'));
		var tr = button.closest('tr');
		var index = tr.index();
		var rows = [];
		
		tr.remove();
		
		$.each(JSON.parse(field.val() || []), function(key, obj){
			
			if(index != key) rows.push(obj);
			
		});
		
		
		field.val(JSON.stringify(rows));
	});
	
});
</script>
@append
@include('layout.partials.datatable', [
	'url' => url("products/index"),
	'permission' => 'PRODUCTS',
	'columns' => [
		'id' => $model->labels['id'],
		'name' => $model->labels['name'],
		'version' => $model->labels['version']
	]
])
