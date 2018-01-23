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
                                            {{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
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