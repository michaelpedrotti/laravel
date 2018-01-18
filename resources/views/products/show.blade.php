<div class="row">
    <title class="hidden">Visualizar Produto</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="col-md-12">
                    <fieldset>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['name'] }}</label>
                                <div class="form-control">{{ $model->name }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['version'] }}</label>
                                <div class="form-control">{{ $model->version }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['key'] }}</label>
                                <div class="form-control">{{ $model->key }}</div>
                            </div>
                        </div>
                    </fieldset>    
                </div>
            </div>
        </div>
    </div>
</div>