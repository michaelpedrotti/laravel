@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Cliente</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('clients/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
					<fieldset>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("name", "has-error") }}">
									<label class="control-label">Nome  <span class="request">*</span></label>
									{{ Form::text('name', $model->User->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
									@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("email", "has-error") }}">
									<label class="control-label">E-mail  <span class="request">*</span></label>
									{{ Form::text('email', $model->User->email, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
									@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
									@endif
								</div>
							</div>
							@cannot('RESELLER', 'Permission')
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("reseller_id", "has-error") }}">
									<label class="control-label">{{ $model->labels['reseller_id'] }}  <span class="request">*</span></label>
									{{ Form::select('reseller_id', app_fetch('Resellers', 'name', 'id'), $model->reseller_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
									@if ($errors->has('reseller_id'))
									<span class="help-block">
										<strong>{{ $errors->first('reseller_id') }}</strong>
									</span>
									@endif
								</div>
							</div>
							@endcan
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("cnpj", "has-error") }}">
									<label class="control-label">{{ $model->labels['cnpj'] }}  </label>
									{{ Form::text('cnpj', $model->cnpj, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control cnpj', 'placeholder' => '']) }}
									@if ($errors->has('cnpj'))
									<span class="help-block">
										<strong>{{ $errors->first('cnpj') }}</strong>
									</span>
									@endif
								</div>
							</div>

					</fieldset>    

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>