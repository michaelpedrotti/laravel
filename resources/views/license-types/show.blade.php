<div class="row">
    <title class="hidden">Visualizar Tipo de licença</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="col-md-12">
                    <fieldset>
                        <div class="col-sm-12">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['name'] }}</label>
                                <div class="form-control">{{ $model->name }}</div>
                            </div>
                        </div>
						<div class="col-sm-12">
							<div class="form-body">
								<label class="control-label">{{ $model->labels['product_id'] }}  <span class="request">*</span></label>
								<div class="form-control">{{ $model->Product->name }}</div>
							</div>
						</div>
                    </fieldset>    
                </div>
            </div>
        </div>
    </div>
</div>