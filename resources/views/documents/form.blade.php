@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Tipo de documento</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('documents/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">

                        <div class="col-md-12">
                            <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("type_id", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['type_id'] }}  <span class="request">*</span>:</label>
                                            {{ Form::select('type_id', \App\Models\DocumentTypes::getModel()->search()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->type_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("name", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['name'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("mimetyppe", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['mimetyppe'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('mimetyppe', $model->mimetyppe, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("size", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['size'] }}  <span class="request">*</span>:</label>
                                            {{ Form::number('size', $model->size, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
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