@section('tab-content')
<div class="tab-pane active">
	{{ Form::open(['method' => 'post', 'url' => url('users/password'), 'class' => 'form-horizontal']) }}
	<div class="form-body">
		<div class="form-group {{ $errors->has('password_current') ? 'has-error' : '' }}">
			<label class="col-md-3 control-label"><b class="labelSenha">Senha Atual</b></label>
			<div class="col-md-9">
				{{ Form::password('password_current', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control senha_antiga', 'placeholder' => 'Senha Antiga']) }}
				<span class="help-block">{{ $errors->first('password_current') }}</span>
			</div>
		</div>

		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			<label class="col-md-3 control-label"><b class="labelSenha">Nova Senha</b></label>
			<div class="col-md-9">
				{{ Form::password('password', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control nova_senha', 'placeholder' => 'Nova Senha']) }}
				<span class="help-block">{{ $errors->first('password') }}</span>
			</div>
		</div>


		<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
			<label class="col-md-3 control-label"><b>Confirmar Nova Senha</b></label>
			<div class="col-md-9">
				{{ Form::password('password_confirmation', ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control nova_senha_confirmar', 'placeholder' => 'Confirmar Nova Senha']) }}
				<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn-danger">Alterar</button>
			</div>
		</div>
	</div>

	{{ Form::close() }}
</div>
@stop
@include('users.partials.settings', ['expanded' => 'password'])