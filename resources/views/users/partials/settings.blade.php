@extends('layout.app')
@section('content')
<div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="/assets/img/anyone.jpg" alt="User profile picture">

				<h3 class="profile-username text-center">{{ \Auth::user()->name }}</h3>

				<p class="text-muted text-center">{{ \Auth::user()->email }}</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Avatar</b> <a href="javascript:void(0)" class="pull-right disabled">Alterar</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="{{ $expanded == 'address' ? 'active' : ''}}">
					<a href="{{ url('users/address') }}" aria-expanded="{{ $expanded == 'address' ? 'true' : 'false'}}">Endereço</a>
				</li>
				<li class="{{ $expanded == 'password' ? 'active' : ''}}">
					<a href="{{ url('users/password') }}" aria-expanded="{{ $expanded == 'password' ? 'true' : 'false'}}">Trocar senha</a>
				</li>
			</ul>
			<div class="tab-content">
				@yield('tab-content')
			</div>
		</div>
	</div>
</div>
@stop