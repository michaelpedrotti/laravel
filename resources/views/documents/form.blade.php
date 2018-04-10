@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Tipo de documento</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('documents/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
				<div class="form-body">
					<fieldset>

						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("type_id", "has-error") }}">
								<label class="control-label">{{ $model->labels['type_id'] }}  <span class="request">*</span></label>
								{{ Form::select('type_id', app_fetch('DocumentTypes', 'name', 'id'), $model->type_id, ['class' => 'form-control select2']) }}
								@if ($errors->has('type_id'))
									<span class="help-block">
										<strong>{{ $errors->first('type_id') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("acl_id", "has-error") }}">
								<label class="control-label">Nível de acesso <span class="request">*</span></label>
								{{ Form::select('acl_id', app_fetch('Acls', 'name', 'id'), $model->type_id, ['class' => 'form-control select2']) }}
								@if ($errors->has('acl_id'))
									<span class="help-block">
										<strong>{{ $errors->first('acl_id') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("name", "has-error") }}">
								<label class="control-label">{{ $model->labels['name'] }}  <span class="request">*</span></label>
								{{ Form::text('name' , $model->name, ['class' => 'form-control']) }}
								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("attach", "has-error") }}">
								<label class="control-label">Documento <span class="request">*</span></label>
								@if(empty($model->id))
									{{ Form::file('attach', ['class' => 'form-control']) }}
								@else
								<div class="input-group">
									{{ Form::file('attach', ['class' => 'form-control']) }}
									<a href="{{ url('documents/download/'.$model->id ) }}" title="Baixar o documento" class="input-group-addon btn btn-link btn-default">
										<i class="fa fa-download"></i>	
									</a>
								</div>
								@endif
								@if ($errors->has('attach'))
									<span class="help-block">
										<strong>{{ $errors->first('attach') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</fieldset>    
				</div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>