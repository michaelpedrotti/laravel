<ul class="sidebar-menu" data-widget="tree">
	@foreach(app_menu() as $menu)
		@if($menu['disabled'])
		@else
			<li data-route="{{ $menu['url'] }}" @if(!empty($menu['child'])) class="treeview"@endif >
				<a href="{{ empty($menu['url']) ? 'javascript:void(0)' : url($menu['url']) }}">
					<i class="fa {{ array_get($menu, 'icon') }}"></i>
					<span>{{ $menu['label'] }}</span>
				</a>
				@if(!empty($menu['child']))
					<ul class="treeview-menu">
						@foreach($menu['child'] as $child)
							@if($child['disabled']) continue; @endif
							<li data-route="{{ $child['url'] }}">
								<a href="{{ empty($child['url']) ? 'javascript:void(0)' : url($child['url']) }}">
									<i class="fa {{ array_get($child, 'icon') }}"></i> 
									<span>{{ $child['label'] }}</span>
								</a>
							</li>
						@endforeach
					</ul>
				@endif
			</li>
		@endif
	@endforeach
</ul>