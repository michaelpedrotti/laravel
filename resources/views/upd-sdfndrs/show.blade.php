<div class="row">
    <title class="hidden">Visualizar Smart Defender</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
				<fieldset>
					<div class="col-sm-6">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['type'] }}</label>
							<div class="form-control">{{ array_get($model->types, $model->type, $model->type) }}</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['status'] }}</label>
							<div class="form-control">{{ array_get($model->arrStatus, $model->status, $model->status) }}</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['value'] }}</label>
							<div class="form-control">{{ $model->value }}</div>
						</div>
					</div>
				</fieldset>    
            </div>
        </div>
    </div>
</div>