<div class="row">
    <title class="hidden">Visualizar Extensão por regra</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="col-md-12">
                    <fieldset>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['to_address'] }}</label>
                                <div class="form-control">{{ $model->to_address }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['from_address'] }}</label>
                                <div class="form-control">{{ $model->from_address }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['timestamp'] }}</label>
                                <div class="form-control">{{ $model->timestamp }}</div>
                            </div>
                        </div>
                    </fieldset>    
                </div>
            </div>
        </div>
    </div>
</div>