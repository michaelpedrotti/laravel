@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Licença</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('licenses/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">

                        <div class="col-md-12">
                            <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("product_id", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['product_id'] }}  <span class="request">*</span>:</label>
                                            {{ Form::select('product_id', \App\Models\Products::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->product_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("type_id", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['type_id'] }}  <span class="request">*</span>:</label>
                                            {{ Form::select('type_id', \App\Models\LicenseTypes::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->type_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("user_id", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['user_id'] }}  <span class="request">*</span>:</label>
                                            {{ Form::select('user_id', \App\Models\Users::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->user_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("length", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['length'] }}  :</label>
                                            {{ Form::number('length', $model->length, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("expiration", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['expiration'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('expiration', $model->expiration, ['placeholder' => 'dd/mm/aaaa', 'data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control maskDate date-picker']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("hash", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['hash'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('hash', $model->hash, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
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