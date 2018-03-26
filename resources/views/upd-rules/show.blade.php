<div class="row">
    <title class="hidden">Visualizar Regra</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
				<fieldset>
 
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['type'] }}</label>
							<div class="form-control">{{ $model->type }}</div>
						</div>
					</div>
 
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['name'] }}</label>
							<div class="form-control">{{ $model->name }}</div>
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