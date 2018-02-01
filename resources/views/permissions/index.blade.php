@extends('layout.app')

@section('breadcrumb')
<h1><small>Perfil  {{ $acl->name }}</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
	<li><a href="{{ url('/acls') }}"><i class="fa fa-lock"></i> Perfil</a></li>
	<li class="active">Permissões</li>
</ol>
@stop

@section('search')
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['permission'] }}</label>
		{{ Form::text('desc', $model->desc, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
	</div>
</div>
@stop

@section('javascript')
<script type="text/javascript">

$.extend( true, $.fn.dataTable.defaults, {
    columnDefs: [
        {
            targets: 0,
            searchable: false,
            orderable: false,
            className: 'select-checkbox',
            width:'20px',
            render: function(value, display, row){
                return '<input type="checkbox" ' + (row.check ? 'checked="checked"' : '') +' value="' + row.id +'" />';
            }
        },
		{
            targets: 1,
            searchable: false,
            orderable: false,
        }
    ]
});

$(function (){
   
	$('table.dataTable').delegate('input[type=checkbox]', 'click', function(){
	
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
	});
});
</script>
@append


@include('layout.partials.datatable', [
	'url' => url('permissions/index', ['id' => app('request')->route('id')]),
	'columns' => [
		'id' => $model->labels['id'],
		'desc' => $model->labels['permission']
	],
	'disableToolbar' => true
])