@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Cliente</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('clients/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">

                        <div class="col-md-12">
                            <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("user_id", "has-error") }}">
											<label class="control-label">{{ $model->labels['user_id'] }}  <span class="request">*</span></label>
                                            {{ Form::select('user_id', \App\Models\Users::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->user_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
											@if ($errors->has('user_id'))
											<span class="help-block">
												<strong>{{ $errors->first('user_id') }}</strong>
											</span>
											@endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("reseller_id", "has-error") }}">
											<label class="control-label">{{ $model->labels['reseller_id'] }}  <span class="request">*</span></label>
                                            {{ Form::select('reseller_id', \App\Models\Resellers::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->reseller_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
											@if ($errors->has('reseller_id'))
											<span class="help-block">
												<strong>{{ $errors->first('reseller_id') }}</strong>
											</span>
											@endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("cnpj", "has-error") }}">
											<label class="control-label">{{ $model->labels['cnpj'] }}  </label>
                                            {{ Form::text('cnpj', $model->cnpj, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
											@if ($errors->has('cnpj'))
											<span class="help-block">
												<strong>{{ $errors->first('cnpj') }}</strong>
											</span>
											@endif
                                        </div>
                                    </div>
                                                  
                            </fieldset>    
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>