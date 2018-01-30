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
								{{ Form::select('type_id', \App\Models\DocumentTypes::getModel()->search()->pluck('name', 'id')->prepend('Selecione', '')->toArray(), $model->product_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
								@if ($errors->has('type_id'))
									<span class="help-block">
										<strong>{{ $errors->first('type_id') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("name", "has-error") }}">
								<label class="control-label">{{ $model->labels['name'] }}  <span class="request">*</span></label>
								{{ Form::text('name' , $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control']) }}
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
								{{ Form::file('attach', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control']) }}
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