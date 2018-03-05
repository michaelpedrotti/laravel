<div class="row">
    <title class="hidden">Visualizar Tipo de documento</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="col-md-12">
                    <fieldset>
 
						<div class="col-sm-12">
							<div class="form-body">
								<label class="control-label">{{ $model->labels['type_id'] }}</label>
								<div class="form-control">{{ $model->DocumentTypes->name }}</div>
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="form-body">
								<label class="control-label">{{ $model->labels['acl_id'] }}</label>
								<div class="form-control">{{ $model->Acl->name }}</div>
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
								<label class="control-label">Documento</label>
								<div class="input-group">
									<div class="form-control">{{ $model->downloadName() }}</div>
									<a href="{{ url('documents/download/'.$model->id ) }}" title="Baixar o documento" class="input-group-addon btn btn-link btn-default">
										<i class="fa fa-download"></i>	
									</a>
								</div>
							</div>
						</div>
                    </fieldset>    
                </div>
            </div>
        </div>
    </div>
</div>