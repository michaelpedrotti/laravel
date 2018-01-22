<!-- USER-MENU:BEGIN -->
<li class="dropdown user user-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<img src="/assets/adminlte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
		<span class="hidden-xs">{{ Auth::user()->name }}</span>
	</a>
	<ul class="dropdown-menu" style="width:80px">
		<li class="header">
			<a href="{{ url('users/settings-acls') }}" class="">
				<i class="fa fa-user-circle"></i>Perfil
			</a>
		</li>
		<li>
			<a href="{{ route('logout') }}">
				<i class="fa fa-sign-out"></i>Logout
			</a>
		</li>
	</ul>
</li>
<!-- USER-MENU:END -->