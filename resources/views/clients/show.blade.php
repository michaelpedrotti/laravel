<div class="row">
    <title class="hidden">Visualizar Cliente</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
				<fieldset>
					<div class="col-sm-12">
						<div class="form-body {{ $errors->first("name", "has-error") }}">
							<label class="control-label">Nome</label>
							<div class="form-control">{{ $model->User->name }}</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-body {{ $errors->first("email", "has-error") }}">
							<label class="control-label">E-mail</label>
							<div class="form-control">{{ $model->User->email }}</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-body {{ $errors->first("reseller_id", "has-error") }}">
							<label class="control-label">{{ $model->labels['reseller_id'] }}</label>
							<div class="form-control">{{ $model->Reseller->User->name }}</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-body {{ $errors->first("cnpj", "has-error") }}">
							<label class="control-label">{{ $model->labels['cnpj'] }}</label>
							<div class="form-control">{{ $model->cnpj }}</div>
						</div>
					</div>
				</fieldset>    
            </div>
        </div>
    </div>
</div>