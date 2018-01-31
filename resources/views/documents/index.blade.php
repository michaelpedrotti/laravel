@extends('layout.app')

@section('breadcrumb')
<h1><small>Tipo de documento</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Documentos</li>
</ol>
@stop

@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['type_id'] }}</label>
		{{ Form::select('type_id', \App\Models\DocumentTypes::getModel()->search()->pluck('name', 'id')->prepend('Selecione', '')->toArray(), $model->type_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['name'] }}</label>
		{{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
@stop

@section('toolbar')
<span class="btn-lg"></span>
<a href="javascript:void(0)" data-action="download" class="btn btn-default"><i class="fa fa-download"></i></a>
@stop

@section('javascript')
<script type="text/javascript">
$(function(){

	$('a[data-action=download]').click(function(){
		
		var button = $(this);
		var container = button.parents('div.box');
    
		var selector = container.find('tbody').find('input[type=checkbox]:checked');

		if(selector.length <= 0) {
			APP.flash('Selecine um registro', 'warning');
			return false;
		}

		window.location = APP.current_controller + '/download/' + selector.first().val();
	});
});
</script>
@append

@include('layout.partials.datatable', [
	'url' => url("documents/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'type_id' => $model->labels['type_id'],
		'name' => $model->labels['name'],
		'mimetype' => $model->labels['mimetype'],
		'extension' => $model->labels['extension'],
		'size' => $model->labels['size']
	]
])