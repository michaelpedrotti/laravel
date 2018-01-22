@extends('layout.app')
@section('content')
<div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="/assets/adminlte/dist/img/user2-160x160.jpg" alt="User profile picture">

				<h3 class="profile-username text-center">{{ \Auth::user()->name }}</h3>

				<p class="text-muted text-center">Software Engineer</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Followers</b> <a class="pull-right">1,322</a>
					</li>
					<li class="list-group-item">
						<b>Following</b> <a class="pull-right">543</a>
					</li>
					<li class="list-group-item">
						<b>Friends</b> <a class="pull-right">13,287</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="{{ $expanded == 'acls' ? 'active' : ''}}">
					<a href="{{ url('users/settings-acls') }}" aria-expanded="{{ $expanded == 'acls' ? 'true' : 'false'}}">Informações</a>
				</li>
				<li class="{{ $expanded == 'password' ? 'active' : ''}}">
					<a href="{{ url('users/settings-password') }}" aria-expanded="{{ $expanded == 'password' ? 'true' : 'false'}}">Trocar senha</a>
				</li>
			</ul>
			<div class="tab-content">
				@yield('tab-content')
			</div>
		</div>
	</div>
</div>
@stop