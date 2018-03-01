<div class="col-sm-12">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['zend_id'] }}</label>
		<div class="form-control">{{ $model->zend_id }}</div>
	</div>
</div>
<div class="col-sm-12">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['product_id'] }}</label>
		<div class="form-control">{{ $model->Product->name }} - {{ $model->Product->version }}</div>
	</div>
</div>
<div class="col-sm-12">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['type_id'] }}</label>
		<div class="form-control">{{ $model->Type->name }}</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['status'] }}</label>
		<div class="form-control">{{ array_get($model->statusMapper(), $model->status, $model->status) }}</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="form-body">
		<label class="control-label">{{ __('Distribuidor') }}</label>
		<div class="form-control">{{ $model->Custumer->Reseller->User->name }}</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="form-body">
		<label class="control-label">{{ __('Revendedor') }}</label>
		<div class="form-control">{{ $model->Custumer->User->name }}</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['customer_id'] }}</label>
		<div class="form-control">{{ $model->Custumer->User->name }}</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['count'] }}  </label>
		<div class="form-control">{{ $model->count }}</div>
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['expiration_app'] }}</label>
		<div class="form-control">{{ app_date($model->expiration_app, 'Y-m-d', 'd/m/Y') }}</div>
	</div>
</div>
<div class="col-sm-6">
	<div class="form-body">
		<label class="control-label">{{ $model->labels['expiration_upd'] }}</label>
		<div class="form-control">{{ app_date($model->expiration_upd, 'Y-m-d', 'd/m/Y') }}</div>
	</div>
</div>