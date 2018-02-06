@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Licença</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('licenses/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">
						<fieldset>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("type_id", "has-error") }}">
									<label class="control-label">{{ $model->labels['type_id'] }}  <span class="request">*</span></label>
									<div class="input-group">
										{{ Form::select('type_id', app_fetch('LicenseTypes', 'name', 'id'), $model->product_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
										<a class="btn btn-link input-group-addon" 
										   data-action="create" 
										   data-modal="#modal-secondary"
										   data-url="{{ url('license-types/form') }}" 
										   fn-callback="APP.loadComboType"><i class="fa fa-plus"></i>
										</a>	
									</div>
									@if ($errors->has('type_id'))
									<span class="help-block">
										<strong>{{ $errors->first('type_id') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("product_id", "has-error") }}">
									<label class="control-label">{{ $model->labels['product_id'] }}  <span class="request">*</span></label>
									{{ Form::select('product_id',  app_fetch('Products', 'name', 'id'), $model->product_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
									@if ($errors->has('product_id'))
									<span class="help-block">
										<strong>{{ $errors->first('product_id') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-body {{ $errors->first("user_id", "has-error") }}">
									<label class="control-label">{{ $model->labels['user_id'] }}  <span class="request">*</span></label>
									{{ Form::select('user_id', app_fetch('Users', 'name', 'id'), $model->user_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
									@if ($errors->has('user_id'))
									<span class="help-block">
										<strong>{{ $errors->first('user_id') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-body {{ $errors->first("length", "has-error") }}">
									<label class="control-label">{{ $model->labels['length'] }}</label>
									{{ Form::number('length', $model->length, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control integer', 'placeholder' => '']) }}
									@if ($errors->has('length'))
									<span class="help-block">
										<strong>{{ $errors->first('length') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-body {{ $errors->first("expiration", "has-error") }}">
									<label class="control-label">{{ $model->labels['expiration'] }}  <span class="request">*</span></label>
									{{ Form::text('expiration', app_date($model->expiration, 'Y-m-d', 'd/m/Y'), ['placeholder' => 'dd/mm/aaaa', 'data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control datepicker']) }}
									@if ($errors->has('expiration'))
									<span class="help-block">
										<strong>{{ $errors->first('expiration') }}</strong>
									</span>
									@endif
								</div>
							</div>          
						</fieldset>    
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
APP.loadComboType = function(button){
    APP.loadCombo('select[name=type_id]', 'LicenseTypes');
};
</script>