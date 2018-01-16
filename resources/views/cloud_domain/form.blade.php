@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Dominios na núvem</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'url' => url('cloud-domain/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">

                        <div class="col-md-12">
                            <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("point", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['point'] }}  <span class="request">*</span>:</label>
                                            {{ Form::number('point', $model->point, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("domain", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['domain'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('domain', $model->domain, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("server", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['server'] }}  <span class="request">*</span>:</label>
                                            {{ Form::text('server', $model->server, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("port", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['port'] }}  <span class="request">*</span>:</label>
                                            {{ Form::number('port', $model->port, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("enabled", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['enabled'] }}  :</label>
                                            {{ Form::text('enabled', $model->enabled, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("userId", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['userId'] }}  <span class="request">*</span>:</label>
                                            {{ Form::number('userId', $model->userId, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
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