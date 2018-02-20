@extends('layout.app')
@section('breadcrumb')
<h1><small>Licença</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Licença</li>
</ol>
@stop
@section('toolbar')
	@can('ADMIN', 'Permission')
		<span class="btn-lg"></span>
		<button type="button" class="btn btn-warning" data-action="generate-license">
			<i class="fa fa-key"></i> Gerar Licença 
		</button>
	@endcan
@stop
@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['product_id'] }}</label>
		{{ Form::select('product_id', app_fetch('Products', 'name', 'id'), '', ['class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['type_id'] }}</label>
		{{ Form::select('type_id', app_fetch('LicenseTypes', 'name', 'id'), '', ['class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['customer_id'] }}</label>
		{{ Form::select('customer_id', app_fetch('Clients', 'name', 'id'), '', ['class' => 'form-control select2']) }}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['status'] }}</label>
		{{ Form::select('status', array_merge(['' => 'Selecione'], $model->getStatus()), '', ['class' => 'form-control select2']) }}
	</div>
</div>
@stop
@section('javascript')
<script type="text/javascript">	

APP.GenerateLicense = function(){
	
	var button = $(this);
	var table = $(button.attr('data-table') || 'table.dataTable');
    var selector = table.find('tbody').find('input[type=checkbox]:checked');

    if(selector.length <= 0) {
        APP.flash('Selecine um registro', 'warning');
        return false;
    }
	
	$.ajax({

        method:'GET',
        url:APP.current_controller + '/update/' + selector.first().val(),
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN':APP.token
        },
        error:function(jqXHR, textStatus, errorThrown){
			APP.flash('Falha na requisição. Tente novamente mais tarde', 'danger');
        }, 
        success:function(data){
			
			if(data.success) {
				APP.flash(data.msg, 'success');
				table.DataTable().ajax.reload();
			}
			else {
				APP.flash(data.msg, 'warning'); 
			}
        }  
    });
};
	
$(function(){
	
	$('button[data-action=generate-license]').click(APP.GenerateLicense);
	
	$('#modal-primary').delegate('select[name=distributor_id]', 'change', function(){
		
		APP.loadCombo($('select[name=reseller_id]'), 'Resellers', {
			distributor_id:$(this).val()
		});
	});
	
	$('#modal-primary').delegate('select[name=reseller_id]', 'change', function(){
		
		APP.loadCombo($('select[name=customer_id]'), 'Clients', {
			reseller_id:$(this).val()
		});
	});
	
});

</script>
@append
@include('layout.partials.datatable', [
	'url' => url("licenses/index"),
	'permission' => 'LICENSES',
	'columns' => [
		'id' => $model->labels['id'],
		'product_id' => $model->labels['product_id'],
		'type_id' => $model->labels['type_id'],
		'customer_id' => $model->labels['customer_id'],
		'expiration' => $model->labels['expiration'],
		'status' => $model->labels['status'],
	]
])
