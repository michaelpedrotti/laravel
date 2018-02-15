<div class="row">
    <title class="hidden">Visualizar Licença</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
				<fieldset>
 
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['product_id'] }}</label>
							<div class="form-control">{{ $model->Product->name }}</div>
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
							<label class="control-label">{{ $model->labels['customer_id'] }}</label>
							<div class="form-control">{{ $model->Custumer->User->name }}</div>
						</div>
					</div>
 
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['count'] }}</label>
							<div class="form-control">{{ $model->count }}</div>
						</div>
					</div>
 
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['expiration'] }}</label>
							<div class="form-control">{{ app_date($model->expiration, 'Y-m-d', 'd/m/Y') }}</div>
						</div>
					</div>

				</fieldset>    
            </div>
        </div>
    </div>
</div>