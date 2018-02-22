@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Contato</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url($url.'/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">
                            <fieldset>
								<div class="col-sm-12">
									<div class="form-body {{ $errors->first("type", "has-error") }}">
										<label class="control-label">{{ $model->labels['type'] }}  <span class="request">*</span></label>
										{{ Form::select('type', $model->getTypes(), $model->type, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
										@if ($errors->has('type'))
										<span class="help-block">
											<strong>{{ $errors->first('type') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-body {{ $errors->first("name", "has-error") }}">
										<label class="control-label">{{ $model->labels['name'] }}  <span class="request">*</span></label>
										{{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
										@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-body {{ $errors->first("email", "has-error") }}">
										<label class="control-label">{{ $model->labels['email'] }}  <span class="request">*</span></label>
										{{ Form::text('email', $model->email, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
										@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
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