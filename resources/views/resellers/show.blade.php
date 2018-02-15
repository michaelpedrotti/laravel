<div class="row">
    <title class="hidden">Visualizar Revendedor</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
				<fieldset>
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">Nome</label>
							<div class="form-control">{{ $model->User->name }}</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">E-mail</label>
							<div class="form-control">{{ $model->User->email }}</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['distributor_id'] }}</label>
							<div class="form-control">{{ $model->Distributor->User->name }}</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-body">
							<label class="control-label">{{ $model->labels['cnpj'] }}</label>
							<div class="form-control">{{ $model->cnpj }}</div>
						</div>
					</div>

				</fieldset>    
            </div>
        </div>
    </div>
</div>