<div class="row">
    <title class="hidden">Visualizar Produto</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
				<fieldset>
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['name'] }}</label>
							<div class="form-control">{{ $model->name }}</div>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['version'] }}</label>
							<div class="form-control">{{ $model->version }}</div>
						</div>
					</div>
					
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">Chave</label>
							<div class="input-group">
								<div class="form-control">{{ $model->License->filename }}</div>
								<a href="{{ url('/products/download', ['id' => $model->id]) }}" title="Baixar a licença" class="input-group-addon btn btn-link btn-default">
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