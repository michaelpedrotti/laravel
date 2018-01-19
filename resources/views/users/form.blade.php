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
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("name", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['name'] }}: <span class="request">*</span></label>
                                            {{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
											<span title="Hello World" class="help-block">{{ $errors->first("name") }}</span>
										</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("email", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['email'] }}:  <span class="request">*</span></label>
                                            {{ Form::text('email', $model->email, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
											<span class="help-block">{{ $errors->first("email") }}</span>
										</div>
                                    </div>
								
									@if(empty($model->id))
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("password", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['password'] }}:  <span class="request">*</span></label>
                                            {{ Form::password('password', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
											<span class="help-block">{{ $errors->first("password") }}</span>
										</div>
                                    </div>
								
									<div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("confirm_password", "has-error") }}">
                                            <label class="control-label">Confirmar Senha:  <span class="request">*</span></label>
                                            {{ Form::password('confirm_password', ['data-required' => 1, 'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
											<span class="help-block">{{ $errors->first("confirm_password") }}</span>
										</div>
                                    </div>
									@endif
									
									<div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("acl_id", "has-error") }}">
                                            <label class="control-label">Perfil:  <span class="request">*</span></label>
                                            {{ Form::select('acl_id', $acls, ($model->Acls->count() > 0 ? $model->Acls->first()->id : null ), ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
											<span class="help-block">{{ $errors->first("acl_id") }}</span>
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