@extends('layout.app')
@section('breadcrumb')
<h1><small>Controle de acesso</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Controle de acesso</li>
</ol>
@stop
@section('toolbar')
<a href="javascript:void(0)" title="Permissões" data-action="permission" class="btn btn-primary">
	<i class="fa fa-qrcode"></i>
</a>
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
		<label class="control-label">{{ $model->labels['uid'] }}</label>
		{{ Form::text('uid', $model->uid, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
@stop
@section('javascript')
<script type="text/javascript">	

APP.Permission = function(){
	
	var button = $(this);
    var container = button.parents('div.box');
    
    var selector = container.find('tbody').find('input[type=checkbox]:checked');

    if(selector.length <= 0) {
        APP.flash('Selecine um registro', 'warning');
        return false;
    }

    window.location = APP.base_url + '/permissions/index/' + selector.first().val();
};
	
$(function(){
	
	 $('a[data-action=permission], button[data-action=permission]').click(APP.Permission);
	
});
</script>
@append

@include('layout.partials.datatable', [
	'url' => url("acls/index"),
	'columns' => [
		'id' => $model->labels['id'],
		'name' => $model->labels['name'],
		'uid' => $model->labels['uid'],
	]
])
