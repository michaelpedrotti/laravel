@extends('layout.app')
@section('breadcrumb')
<h1><small>Licença</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Licença</li>
</ol>
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
		{{ Form::select('status', array_merge(['' => 'Selecione'], $model->statusMapper()), '', ['class' => 'form-control select2']) }}
	</div>
</div>
@stop
@section('javascript')
<script type="text/javascript">	

var NS = APP.ns('APP.modules.Licenses');

NS.GenerateLicense = function(){
	
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

NS.onProductChange = function(){
	
	var selector = $('#tab-license-attributes').empty();
	var product_id = $(this).val();
	var license_id = $(this).closest('form').attr('action').replace(/^\D+/g, '');
	
	if(!product_id) return false;

	$.ajax({

        method:'GET',
        url:APP.current_controller + '/product-attributes/',
		data:{
			product_id:product_id,
			license_id:license_id
		},
        dataType:'html',
        headers: {
            'X-CSRF-TOKEN':APP.token
        },
        error:function(jqXHR){
			selector.html('<pre>' + jqXHR.responseText + '</pre>');     
        }, 
        success:function(content){
			selector.html(content);      
        }  
    });
};

NS.onResellerChange = function(){
	
	APP.loadCombo($('select[name=customer_id]'), 'Clients', {
		reseller_id:$(this).val()
	});
};

NS.onDistributorChange = function(){
	
	APP.loadCombo($('select[name=reseller_id]'), 'Resellers', {
		distributor_id:$(this).val()
	});
};

NS.addNetwork = function(){
	
	var button = $(this);
    var field = button.closest('.form-body').find('input[type=text]');
	
    button.attr('disabled', 'disabled');
    
    $.ajax({

        method:"POST",
        type:"POST",
        url:'{{ url("/licenses/add-network") }}',
		data:{
			network:field.val()
		},
        dataType:'html',
        headers: {
            'X-CSRF-TOKEN':APP.token
         },
        complete:function() {
            button.removeAttr('disabled');
        },
        error:function(jqXHR, textStatus, errorThrown){
			
			var message = errorThrown;
			
			try {
				
				var data = JSON.parse(jqXHR.responseText);
				message = data.errors.network[0];
			}
			catch(e){}
		
			// 
			APP.flash(message, 'warning');
        }, 
        success:function(content, textStatus, jqXHR){
			$('#license-network-items').prepend(content);
			field.val('');
        }  
    });
};

NS.remNetwork = function(){
	$(this).closest('.form-body').remove();
};

$(function(){
	
	var modal = $('#modal-primary');
	
	modal.delegate('select[name=distributor_id]', 'change', NS.onDistributorChange);
	modal.delegate('select[name=reseller_id]', 'change', NS.onResellerChange);
	modal.delegate('select[name=product_id]', 'change', NS.onProductChange);
	modal.delegate('[data-action=add-network]', 'click', NS.addNetwork);
	modal.delegate('[data-action=rem-network]', 'click', NS.remNetwork);
	
	$('button[data-action=generate-license]').click(NS.GenerateLicense);
});

</script>
@append
@include('layout.partials.datatable', [
	'url' => url("licenses/index"),
	'permission' => 'LICENSES',
	'columns' => [
		'id' => $model->labels['id'],
		'customer_id' => $model->labels['customer_id'],
		'product_id' => $model->labels['product_id'],
		'type_id' => $model->labels['type_id'],
		'expiration_app' => $model->labels['expiration_app'],
		'expiration_upd' => $model->labels['expiration_upd'],
		'status' => $model->labels['status'],
	]
])
