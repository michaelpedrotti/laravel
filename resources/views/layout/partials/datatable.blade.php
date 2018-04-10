@section('content')
<div class="col-xs-12">
	@if(View::hasSection('search'))
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
					@yield('search')
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
    @endif
	
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Listagem</h3>
			@if(!isset($disableToolbar) || empty($disableToolbar))
				<div class="box-tools">
					@php if(!isset($permission)): $permission = ''; endif; @endphp

					@if(isset($allowAll) || app_can($permission.'_SHOW'))
						<a href="javascript:void(0)" data-action="show" class="btn btn-default"><i class="fa fa-search"></i></a>
					@endif
					@if(isset($allowAll) || app_can($permission.'_ADD'))
						<a href="javascript:void(0)" data-action="create" class="btn btn-success"><i class="fa fa-plus"></i></a>
					@endif
					@if(isset($allowAll) || app_can($permission.'_EDIT'))
						<a href="javascript:void(0)" data-action="edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
					@endif
					@if(isset($allowAll) || app_can($permission.'_REM'))
						<a href="javascript:void(0)" data-action="remove" class="btn btn-danger"><i class="fa fa-remove"></i></a>
					@endif
				
					@yield('toolbar')
				</div>
			@endif
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover dataTable" role="datatable">
				<thead>
					<tr role="row">
						@foreach($columns as $key => $label)
							<th>{{ $key == $model->getKeyName() ? '' : $label }}</th>
						@endforeach
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
$(function (){
	$('table.dataTable').DataTable({
		ajax: {
		   url:'{{ $url }}',
			data: function(data) {

                $.each($('form[data-action=form-search]').serializeArray(), function(index, row){
					if(row.value) data[row.name] = row.value;
                });
			}
		},
		@if(isset($order))
		@php $keys = array_keys($columns) @endphp
		order:[@foreach($order as $key => $dir) [{{ intval(array_search($key, $keys)) }}, '{{ $dir }}'], @endforeach],
		@endif 
		columns: [
			@foreach($columns as $key => $label)
			{data: '{{ $key }}', name: '{{ $key }}', className: 'text-left'},
			@endforeach
		]
   });
});
</script>
@append