@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Usuário</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('users/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">

                        <div class="col-md-12">
                            <fieldset>
                                    <div class="col-sm-12">
                                        <div class="form-body {{ $errors->first("name", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['name'] }}: <span class="request">*</span></label>
                                            {{ Form::text('name', $model->name, ['class' => 'form-control', 'placeholder' => '']) }}
											<span title="Hello World" class="help-block">{{ $errors->first("name") }}</span>
										</div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-body {{ $errors->first("email", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['email'] }}:  <span class="request">*</span></label>
                                            {{ Form::text('email', $model->email, ['class' => 'form-control', 'placeholder' => '']) }}
											<span class="help-block">{{ $errors->first("email") }}</span>
										</div>
                                    </div>	
									<div class="col-sm-12">
                                        <div class="form-body">
                                            <label class="control-label">Perfil</label>
											<div class="form-control">{{ $acl->name }}</div>
											{{ Form::hidden('acl_id', $acl->id) }}
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