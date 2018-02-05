<div class="row">
    <title class="hidden">Visualizar Licença</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="col-md-12">
                    <fieldset>
						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("type_id", "has-error") }}">
								<label class="control-label">{{ $model->labels['type_id'] }}  <span class="request">*</span></label>
								<div class="form-control">{{ $model->Type->name }}</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("product_id", "has-error") }}">
								<label class="control-label">{{ $model->labels['product_id'] }}  <span class="request">*</span></label>
								<div class="form-control">{{ $model->Product->name }}</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("user_id", "has-error") }}">
								<label class="control-label">{{ $model->labels['user_id'] }}  <span class="request">*</span></label>
								<div class="form-control">{{ $model->User->name }}</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-body {{ $errors->first("length", "has-error") }}">
								<label class="control-label">{{ $model->labels['length'] }}</label>
								<div class="form-control">{{ $model->length }}</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-body {{ $errors->first("expiration", "has-error") }}">
								<label class="control-label">{{ $model->labels['expiration'] }}  <span class="request">*</span></label>
								<div class="form-control">{{ app_date($model->expiration, 'Y-m-d', 'd/m/Y') }}</div>
							</div>
						</div> 
                    </fieldset>    
                </div>
            </div>
        </div>
    </div>
</div>