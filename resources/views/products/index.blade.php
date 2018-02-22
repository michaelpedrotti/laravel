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
		
		var container = $('fieldset[data-target]');
		var table = $(container.attr('data-target'));
		var store = container.find('input[name=attributes]');
		var rows = JSON.parse(store.val() || []);
		var row = {}, field;
		
		container.find('input,select,textarea').not('input[name=attributes]').each(function(index, el){

			field = $(el);
			row[field.attr('name')] = field.val();
			field.val('');
		});

		rows.push(row);
		
		store.val(JSON.stringify(rows));
		
		var content = '<tr>';
		
		$.each(row, function(key, value){
			content += '<td>' + value + '</td>';
		});
		
		content += '<td>';
		content += '<a href="javascript:void(0)" data-action="json-rem" class="btn btn-xs btn-danger">';
		content += '<i class="fa fa-remove"></i></a>';
		content += '</td>';
		content += '</tr>';
		
		
		table.find('tbody').append(content);
		
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
