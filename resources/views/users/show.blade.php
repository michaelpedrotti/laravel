<div class="row">
    <title class="hidden">Visualizar Usuário</title>
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
                                <label class="control-label">{{ $model->labels['email'] }}</label>
                                <div class="form-control">{{ $model->email }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['password'] }}</label>
                                <div class="form-control">{{ $model->password }}</div>
                            </div>
                        </div>
 
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['remember_token'] }}</label>
                                <div class="form-control">{{ $model->remember_token }}</div>
                            </div>
                        </div>
                    </fieldset>    
                </div>
            </div>
        </div>
    </div>
</div>