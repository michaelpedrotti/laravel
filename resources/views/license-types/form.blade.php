@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Tipo de licença</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('license-types/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">
                        <div class="col-md-12">
                            <fieldset>
								<div class="col-sm-12">
									<div class="form-body {{ $errors->first("name", "has-error") }}">
										<label class="control-label">{{ $model->labels['name'] }}  <span class="request">*</span></label>
										{{ Form::text('name', $model->name, ['class' => 'form-control', 'placeholder' => '']) }}
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-body {{ $errors->first("product_id", "has-error") }}">
										<label class="control-label">{{ $model->labels['product_id'] }}  <span class="request">*</span></label>
										{{ Form::select('product_id', app_fetch('Products', 'name', 'id'), $model->product_id, ['class' => 'form-control select2']) }}
									</div>
								</div>                  
                            </fieldset>    
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>