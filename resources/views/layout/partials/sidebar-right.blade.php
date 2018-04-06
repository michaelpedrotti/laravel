<aside class="control-sidebar control-sidebar-dark">	
	<div class="tab-content">
		<div class="tab-pane active" id="control-sidebar-home-tab">
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
    </div>
</aside>