<div class="col-sm-12">
	<div class="form-body {{ $errors->first("zend_id", "has-error") }}">
		<label class="control-label">{{ $model->labels['zend_id'] }}  <span class="request">*</span></label>
		{{ Form::text('zend_id', $model->zend_id, ['class' => 'form-control']) }}
		@if ($errors->has('zend_id'))
		<span class="help-block">
			<strong>{{ $errors->first('zend_id') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="col-sm-12">
	<div class="form-body {{ $errors->first("product_id", "has-error") }}">
		<label class="control-label">{{ $model->labels['product_id'] }}  <span class="request">*</span></label>
		{{ Form::select('product_id', app_fetch('Products', 'name', 'id'), $model->product_id, ['class' => 'form-control select2']) }}
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
		{{ Form::select('type_id', app_fetch('LicenseTypes', 'name', 'id'), $model->type_id, ['class' => 'form-control select2']) }}
		@if ($errors->has('type_id'))
		<span class="help-block">
			<strong>{{ $errors->first('type_id') }}</strong>
		</span>
		@endif
	</div>
</div>

@can('ADMIN', 'Permission')
<div class="col-sm-12">
	<div class="form-body {{ $errors->first("distributor_id", "has-error") }}">
		<label class="control-label">{{ __('Distribuidor') }}  <span class="request">*</span></label>
		{{ Form::select('distributor_id', app_fetch('Distributors', 'name', 'id'), $model->Custumer->Reseller->distributor_id, ['class' => 'form-control select2']) }}
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
		<label class="control-label">{{ __('Revendedor') }}  <span class="request">*</span></label>
		{{ Form::select('reseller_id', $resellers, $model->Custumer->reseller_id, ['class' => 'form-control select2']) }}
		@if ($errors->has('reseller_id'))
		<span class="help-block">
			<strong>{{ $errors->first('reseller_id') }}</strong>
		</span>
		@endif
	</div>
</div>
@endif

<div class="col-sm-12">
	<div class="form-body {{ $errors->first("customer_id", "has-error") }}">
		<label class="control-label">{{ $model->labels['customer_id'] }}  <span class="request">*</span></label>
		{{ Form::select('customer_id', app_fetch('Clients', 'name', 'id'), $model->customer_id, ['class' => 'form-control select2']) }}
		@if ($errors->has('customer_id'))
		<span class="help-block">
			<strong>{{ $errors->first('customer_id') }}</strong>
		</span>
		@endif
	</div>
</div>
@can('ADMIN', 'Permission')
<div class="col-sm-12">
	<div class="form-body {{ $errors->first("count", "has-error") }}">
		<label class="control-label">{{ $model->labels['count'] }}  </label>
		{{ Form::number('count', $model->count, ['class' => 'form-control', 'placeholder' => '']) }}
		@if ($errors->has('count'))
		<span class="help-block">
			<strong>{{ $errors->first('count') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body {{ $errors->first("expiration_app", "has-error") }}">
		<label class="control-label">{{ $model->labels['expiration_app'] }}  <span class="request">*</span></label>
		{{ Form::text('expiration_app', app_date($model->expiration_app, 'Y-m-d', 'd/m/Y'), ['placeholder' => 'dd/mm/aaaa', 'class' => 'form-control datepicker']) }}
		@if ($errors->has('expiration_app'))
		<span class="help-block">
			<strong>{{ $errors->first('expiration_app') }}</strong>
		</span>
		@endif
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body {{ $errors->first("expiration_upd", "has-error") }}">
		<label class="control-label">{{ $model->labels['expiration_upd'] }}  <span class="request">*</span></label>
		{{ Form::text('expiration_upd', app_date($model->expiration_upd, 'Y-m-d', 'd/m/Y'), ['placeholder' => 'dd/mm/aaaa', 'class' => 'form-control datepicker']) }}
		@if ($errors->has('expiration_upd'))
		<span class="help-block">
			<strong>{{ $errors->first('expiration_upd') }}</strong>
		</span>
		@endif
	</div>
</div>
@endcan