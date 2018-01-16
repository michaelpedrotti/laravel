@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }} Usuário</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['id' => 'model_form', 'method' => 'post', 'url' => url('users/form', ['id' => $model->id]), 'class' => 'form-horizontal']) }}
                    <div class="form-body">

                        <div class="col-md-12">
                            <fieldset>
                            <div class="col-sm-6">
                                <div class="form-body {{$errors->first("name", "has-error") }}">
                                <label class="control-label">{{ $model->labels['name'] }} <span class="request"> *</span></label>
                                    {{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-body {{$errors->first("email", "has-error") }}">
                                <label class="control-label">{{ $model->labels['email'] }} <span class="request"> *</span></label>
                                    {{ Form::text('email', $model->email, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-body {{$errors->first("password", "has-error") }}">
                                <label class="control-label">{{ $model->labels['password'] }} <span class="request"> *</span></label>
                                    {{ Form::text('password', $model->password, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-body {{$errors->first("remember_token", "has-error") }}">
                                <label class="control-label">{{ $model->labels['remember_token'] }} </label>
                                    {{ Form::text('remember_token', $model->remember_token, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
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