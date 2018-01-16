@section('content')
<div class="col-xs-12">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Listagem</h3>
			<div class="box-tools">
				<a href="javascript:void(0)" data-action="show" class="btn btn-default"><i class="fa fa-search"></i></a>
				<a href="javascript:void(0)" data-action="create" class="btn btn-success"><i class="fa fa-plus"></i></a>
				<a href="javascript:void(0)" data-action="edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
				<a href="javascript:void(0)" data-action="remove" class="btn btn-danger"><i class="fa fa-remove"></i></a>
			</div>
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
		   url:'{{ $url }}'
	   },
	   columns: [
		   @foreach($columns as $key => $label)
		   {data: '{{ $key }}', name: '{{ $key }}', className: 'text-center'},
		   @endforeach
	   ]
   });
});
</script>
@stop