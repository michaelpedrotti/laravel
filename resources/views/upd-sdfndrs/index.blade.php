@extends('layout.app')
@section('breadcrumb')
<h1><small>Smart Defender</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Smart Defender</li>
</ol>
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['user_id'] }}</label>
		{{ Form::select('user_id', \App\Models\Users::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->user_id, ['class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['type'] }}</label>
		{{ Form::select('type', $model->types, $model->type, ['class' => 'form-control select2', 'placeholder' => 'Selecione']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['status'] }}</label>
		{{ Form::select('status', $model->arrStatus, $model->status, ['class' => 'form-control select2', 'placeholder' => '']) }}
	</div>
</div>
@stop

@section('javascript')
<script type="text/javascript" src="/assets/adminlte/bower_components/crypto-js/crypto-js.js"></script>
<script type="text/javascript" src="/assets/adminlte/bower_components/crypto-js/sha1.js"></script>
<script type="text/javascript" src="/assets/adminlte/bower_components/crypto-js/aes.js"></script>  
<script type="text/javascript" src="/assets/adminlte/bower_components/crypto-js/lib-typedarrays.js"></script>
<script type="text/javascript">	

var NS = APP.ns('APP.modules.UpdSdfndrs');

NS.onChangeType = function(){
	
	var combo = $('input[name=value]');
	
	combo.val('');
	combo.inputmask('remove');
	
	switch($(this).val()) {
		case 'FILE':
			combo.inputmask('*{40}');
			break;
			
		case 'IP':
			combo.inputmask('9{1,3}.9{1,3}.9{1,3}.9{1,3}');
			break;
			
		case 'NET':
			combo.inputmask('9{1,3}.9{1,3}.9{1,3}.9{1,3}/9{1,2}');
			break;
	}
};

$(function(){
	
	var modal = $('#modal-primary');
	
	modal.delegate('select[name=type]', 'change', NS.onChangeType);
});

</script>
@append

@include('layout.partials.datatable', [
	'url' => url("upd-sdfndrs/index"),
	'permission' => 'UPDSDFNDRS',
	'columns' => [
		'id' => $model->labels['id'],
		'type' => $model->labels['type'],
		'value' => $model->labels['value'],
		'status' => $model->labels['status'],
		'user_id' => 'Modificado por',
	]
])
