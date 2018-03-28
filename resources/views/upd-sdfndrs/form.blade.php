@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Smart Defender</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('upd-sdfndrs/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">
						<fieldset>
							<div class="col-sm-6">
								<div class="form-body {{ $errors->first("type", "has-error") }}">
									<label class="control-label">{{ $model->labels['type'] }}  <span class="request">*</span></label>
									{{ Form::select('type', $model->types, $model->type, ['class' => 'form-control select2', 'placeholder' => 'Selecione']) }}
									@if ($errors->has('type'))
									<span class="help-block">
										<strong>{{ $errors->first('type') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-body {{ $errors->first("status", "has-error") }}">
									<label class="control-label">{{ $model->labels['status'] }}  <span class="request">*</span></label>
									{{ Form::select('status', $model->arrStatus, $model->status, ['class' => 'form-control select2', 'placeholder' => 'Selecione']) }}
									@if ($errors->has('status'))
									<span class="help-block">
										<strong>{{ $errors->first('status') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("value", "has-error") }}">
									<label class="control-label">{{ $model->labels['value'] }}  <span class="request">*</span></label>
									{{ Form::text('value', $model->value, ['class' => 'form-control']) }}
									@if ($errors->has('value'))
									<span class="help-block">
										<strong>{{ $errors->first('value') }}</strong>
									</span>
									@endif
								</div>

								<span class="btn btn-primary btn-file" style="margin-top:5px; display:none">
									<span>Anexar</span>
									<input id="upd-sdfndrs-attach" type="file" />
								</span>
								<span id="upd-sdfndrs-loading"></span>
							</div>
						</fieldset>    
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>