@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Regra</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('upd-rules/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">
                            <fieldset>
								<div class="col-sm-12">
									<div class="form-body {{ $errors->first("type", "has-error") }}">
										<label class="control-label">{{ $model->labels['type'] }}  <span class="request">*</span></label>
										{{ Form::select('type', ["body" => "body", "header" => "header", "uri" => "uri", "rowbody" => "rowbody", "meta" => "meta"], $model->type, ['class' => 'form-control', 'placeholder' => '']) }}
										@if ($errors->has('type'))
										<span class="help-block">
											<strong>{{ $errors->first('type') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-body {{ $errors->first("name", "has-error") }}">
										<label class="control-label">{{ $model->labels['name'] }}  </label>
										{{ Form::text('name', $model->name, ['class' => 'form-control', 'placeholder' => '']) }}
										@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-body {{ $errors->first("value", "has-error") }}">
										<label class="control-label">{{ $model->labels['value'] }}  </label>
										{{ Form::textarea('value', $model->value, ['class' => 'form-control', 'placeholder' => '']) }}
										@if ($errors->has('value'))
										<span class="help-block">
											<strong>{{ $errors->first('value') }}</strong>
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