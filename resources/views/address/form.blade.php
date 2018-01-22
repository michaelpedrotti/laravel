@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Endereço</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('address/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">

                        <div class="col-md-12">
                            <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("user_id", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['user_id'] }}  <span class="request">*</span>:</label>
                                            {{ Form::select('user_id', \App\Models\Users::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->user_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("cep", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['cep'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('cep', $model->cep, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("address", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['address'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('address', $model->address, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("number", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['number'] }}  :</label>
                                            {{ Form::text('number', $model->number, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("city", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['city'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('city', $model->city, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("state", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['state'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('state', $model->state, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
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