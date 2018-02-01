<ul class="sidebar-menu" data-widget="tree">
	@foreach(app_menu() as $node)
		@include('layout.partials.menu-item', ['node' => $node])
	@endforeach
</ul>