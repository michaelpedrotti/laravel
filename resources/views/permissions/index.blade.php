@extends('layout.app')
@section('breadcrumb')
<h1><small>Permissão do perfil</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Permissão do perfil</li>
</ol>
@stop
@section('content')
<div class="col-xs-12">
		<!-- search.begin -->
		<div class="box box-primary collapsed-box">
			<div class="box-header">
				<h3 class="box-title">Pesquisar</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
					  <i class="fa fa-plus"></i></button>
				  </div>
			</div>
			<div class="box-body">
				{{ Form::open(['class' => 'form-horizontal', 'data-action' => 'form-search']) }}
					<div class="col-sm-6">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['permission'] }}</label>
							{{ Form::text('permission', $model->permission, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['desc'] }}</label>
							{{ Form::text('desc', $model->desc, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
						</div>
					</div>
				{{ Form::close() }}
			</div>
			<div class="box-footer">
				<div class="box-tools">
					<a href="javascript:void(0)" data-action="search" class="btn bg-purple"><i class="fa fa-search"></i> Consultar</a>
					<a href="javascript:void(0)" data-action="reset" class="btn bg-olive"><i class="fa fa-eraser"></i> Limpar</a>
				</div>
			</div>
		</div>
		<!-- search.end -->
	
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Permissões</h3>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover dataTable" role="datatable">
				<thead>
					<tr role="row">
						<th>{{ $model->labels['permission'] }}</th>
						<th>{{ $model->labels['desc'] }}</th>
						<th>Ativo</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
@include('layout.partials.modal')
@stop
@section('javascript')
<script type="text/javascript">
	
APP.onCheckPermission = function(){
	
	var field = $(this);		
	var action = field.is(':checked') ? 'ADD' : 'REM';

	$.ajax({

		method:'POST',
		url:"{{ url('permissions/form') }}",
		data:{
			'acl_id': "{{ app('request')->route('id') }}",
			'permission_id': field.val(),
			'action': action
		},
		dataType:'json',
		headers: {
			'X-CSRF-TOKEN':APP.token
		},
		error:function(){

			alert('error');
		}, 
		success:function(content){

		}  
	});
};	
	
$(function (){
	
	var selector = $('table.dataTable');
	
	selector.DataTable({
		ajax: {
		   url:"{{ url('permissions/index', ['id' => app('request')->route('id')]) }}",
			data: function(data) {

                $.each($('form[data-action=form-search]').serializeArray(), function(index, row){
					data[row.name] = row.value;
                });
			}
		},
		columnDefs: [],
		headerCallback: function(thead) {},
		columns: [

			{data:'permission', name:'permission', className:'text-center'},
			{data:'desc', name:'permission', className:'text-center'},
			{className:'text-center', data:function(row){
				return '<input type="checkbox" ' + (row.check ? 'checked="checked"' : '') +' value="' + row.id +'" />';
			}}
		]
   });
   
   selector.delegate('input[type=checkbox]', 'click', APP.onCheckPermission);
});
</script>
@append
