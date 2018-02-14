@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Distribuidor</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('distributors/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">
						<fieldset>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("name", "has-error") }}">
									<label class="control-label">Nome  <span class="request">*</span></label>
									{{ Form::text('name', $model->cnpj, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
									@if ($errors->has('cnpj'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("email", "has-error") }}">
									<label class="control-label">E-mail  <span class="request">*</span></label>
									{{ Form::text('email', $model->cnpj, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
									@if ($errors->has('cnpj'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("cnpj", "has-error") }}">
									<label class="control-label">{{ $model->labels['cnpj'] }}  <span class="request">*</span></label>
									{{ Form::text('cnpj', $model->cnpj, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control cnpj', 'placeholder' => '']) }}
									@if ($errors->has('cnpj'))
									<span class="help-block">
										<strong>{{ $errors->first('cnpj') }}</strong>
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