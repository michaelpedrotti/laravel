<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li class="active">
			<a href="#control-sidebar-home-tab" data-toggle="tab">
				<i class="fa fa-user"></i>
			</a>
		</li>
		<li>
			<a href="#control-sidebar-settings-tab" data-toggle="tab">
				<i class="fa fa-gears"></i>
			</a>
		</li>
	</ul>
	<!-- Tab panes -->

	
	<div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane active" id="control-sidebar-home-tab">
			<ul class="control-sidebar-menu">
				<li>
					<a href="{{ url('users/password') }}">
						<i class="menu-icon fa fa-key bg-yellow"></i>
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Mudar a senha</h4>
							<p>Trocar a senha</p>
						</div>
					</a>
				</li>
				<li>
					<a href="{{ route('logout') }}">
						<i class="menu-icon fa fa-sign-out bg-red"></i>
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Logout</h4>
							<p>Sair do sistema</p>
						</div>
					</a>
				</li>
			</ul>

		</div>

		<div id="control-sidebar-settings-tab" class="tab-pane">
			<ul class="control-sidebar-menu">
				<li>
					<a href="{{ url('users/address') }}">
						<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Endereço</h4>
							<p>Atualizar dados</p>
						</div>
					</a>
				</li>
			</ul>
		</div>
    </div>
</aside>