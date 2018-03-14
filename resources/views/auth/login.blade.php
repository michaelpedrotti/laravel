@extends('layout.lobby')
@section('content')
	<p class="login-box-msg">@lang('Faça o login para iniciar a sua sessão')</p>

	<form class="form-horizontal" method="POST" action="{{ route('login') }}">
		{{ csrf_field() }}
		<div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
			<input type="email" name="email" class="form-control" placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
			<input type="password" name="password" class="form-control" placeholder="Password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<label>
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('Lembrar senha')
					</label>
				</div>
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">@lang('Entrar')</button>
			</div>
			<!-- /.col -->
		</div>
	</form>

	<a href="{{ route('password.request') }}">@lang('Esqueci minha senha')</a><br>
@endsection
