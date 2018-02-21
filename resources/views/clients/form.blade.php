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
								{{ Form::text('name', $model->User->name, ['class' => 'form-control', 'placeholder' => '']) }}
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
								{{ Form::text('email', $model->User->email, ['class' => 'form-control', 'placeholder' => '']) }}
								@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>
						@can('ADMIN', 'Permission')
						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("distributor_id", "has-error") }}">
								<label class="control-label">{{ __('Distribuidor') }}  <span class="request">*</span></label>
								{{ Form::select('distributor_id', app_fetch('Distributors', 'name', 'id'), request('distributor_id', $model->Reseller->distributor_id), ['class' => 'form-control select2']) }}
								@if ($errors->has('distributor_id'))
								<span class="help-block">
									<strong>{{ $errors->first('distributor_id') }}</strong>
								</span>
								@endif
							</div>
						</div>
						@endcan

						@if(app_can(['ADMIN', 'DISTRIBUTOR']))
						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("reseller_id", "has-error") }}">
								<label class="control-label">{{ $model->labels['reseller_id'] }}  <span class="request">*</span></label>
								{{ Form::select('reseller_id', $resellers, $model->reseller_id, ['class' => 'form-control select2']) }}
								@if ($errors->has('reseller_id'))
								<span class="help-block">
									<strong>{{ $errors->first('reseller_id') }}</strong>
								</span>
								@endif
							</div>
						</div>
						@endif

						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("razao_social", "has-error") }}">
								<label class="control-label">{{ $model->labels['razao_social'] }}  </label>
								{{ Form::text('razao_social', $model->razao_social, ['class' => 'form-control', 'placeholder' => '']) }}
								@if ($errors->has('cnpj'))
								<span class="help-block">
									<strong>{{ $errors->first('razao_social') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-body {{ $errors->first("cnpj", "has-error") }}">
								<label class="control-label">{{ $model->labels['cnpj'] }}  </label>
								{{ Form::text('cnpj', $model->cnpj, ['class' => 'form-control cnpj', 'placeholder' => '']) }}
								@if ($errors->has('cnpj'))
								<span class="help-block">
									<strong>{{ $errors->first('cnpj') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-body {{ $errors->first("inscricao_estadual", "has-error") }}">
								<label class="control-label">{{ $model->labels['inscricao_estadual'] }}  </label>
								{{ Form::text('inscricao_estadual', $model->inscricao_estadual, ['class' => 'form-control', 'placeholder' => '']) }}
								@if ($errors->has('inscricao_estadual'))
								<span class="help-block">
									<strong>{{ $errors->first('inscricao_estadual') }}</strong>
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