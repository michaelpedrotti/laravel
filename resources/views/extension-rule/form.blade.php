@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Extensão por regra</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('extension-rule/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">

                        <div class="col-md-12">
                            <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("to_address", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['to_address'] }}  :</label>
                                            {{ Form::text('to_address', $model->to_address, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("from_address", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['from_address'] }}  :</label>
                                            {{ Form::text('from_address', $model->from_address, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("timestamp", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['timestamp'] }}  :</label>
                                            {{ Form::text('timestamp', $model->timestamp, ['placeholder' => 'dd/mm/aaaa', 'data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control maskDate date-picker']) }}
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