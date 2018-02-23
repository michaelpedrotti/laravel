<form>
	<div class="col-sm-11" style="padding-left:0; padding-right:0">
		<div class="col-sm-6" style="padding-left:0">
			{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome']) }}
		</div>
		<div class="col-sm-6" style="padding-left:0">
			{{ Form::text('key', '', ['class' => 'form-control', 'placeholder' => 'Attributo']) }}
		</div>
	</div>
	<div class="col-sm-1">
		<a href="javascript:void(0)" data-action="json-add" data-table="#jsontable" data-store="#jsonstore" class="btn btn-success pull-right">
			<i class="fa fa-plus"></i>
		</a>
	</div>
	<div class="clearfix" style="margin-bottom:10px"></div>
</form>
<table id="jsontable" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="width:50%">Nome</th>
			<th style="width:50%">Atributo</th>
			<th style="width:10px"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($rows as $row)
		<tr>
			@foreach($row as $value)
				<td>{{ $value }}</td>
			@endforeach
			<td>
				<a href="javascript:void(0)" data-action="json-rem" data-store="#jsonstore" class="btn btn-xs btn-danger">
					<i class="fa fa-remove"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>