@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Licença</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('licenses/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">
						<fieldset>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("product_id", "has-error") }}">
									<label class="control-label">{{ $model->labels['product_id'] }}  <span class="request">*</span></label>
									{{ Form::select('product_id', app_fetch('Products', 'name', 'id'), $model->product_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
									@if ($errors->has('product_id'))
									<span class="help-block">
										<strong>{{ $errors->first('product_id') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("type_id", "has-error") }}">
									<label class="control-label">{{ $model->labels['type_id'] }}  <span class="request">*</span></label>
									{{ Form::select('type_id', app_fetch('LicenseTypes', 'name', 'id'), $model->type_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
									@if ($errors->has('type_id'))
									<span class="help-block">
										<strong>{{ $errors->first('type_id') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("customer_id", "has-error") }}">
									<label class="control-label">{{ $model->labels['customer_id'] }}  <span class="request">*</span></label>
									{{ Form::select('customer_id', app_fetch('Clients', 'name', 'id'), $model->customer_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
									@if ($errors->has('customer_id'))
									<span class="help-block">
										<strong>{{ $errors->first('customer_id') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("count", "has-error") }}">
									<label class="control-label">{{ $model->labels['count'] }}  </label>
									{{ Form::number('count', $model->count, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
									@if ($errors->has('count'))
									<span class="help-block">
										<strong>{{ $errors->first('count') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("expiration", "has-error") }}">
									<label class="control-label">{{ $model->labels['expiration'] }}  <span class="request">*</span></label>
									{{ Form::text('expiration', app_date($model->expiration, 'Y-m-d', 'd/m/Y'), ['placeholder' => 'dd/mm/aaaa', 'data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control datepicker']) }}
									@if ($errors->has('expiration'))
									<span class="help-block">
										<strong>{{ $errors->first('expiration') }}</strong>
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