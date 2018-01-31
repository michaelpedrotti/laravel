<div class="row">
    <title class="hidden">Visualizar Tipo de documento</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="col-md-12">
                    <fieldset>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['type_id'] }}</label>
                                <div class="form-control">{{ $model->type_id }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['name'] }}</label>
                                <div class="form-control">{{ $model->name }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['mimetype'] }}</label>
                                <div class="form-control">{{ $model->mimetype }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['size'] }}</label>
                                <div class="form-control">{{ $model->size }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['hash'] }}</label>
                                <div class="form-control">{{ $model->hash }}</div>
                            </div>
                        </div>
                    </fieldset>    
                </div>
            </div>
        </div>
    </div>
</div>