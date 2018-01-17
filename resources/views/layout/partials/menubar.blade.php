<ul class="sidebar-menu" data-widget="tree">
	
	@foreach(app_menu() as $menu)
		@if($menu['disabled'])
		@else
			@if(empty($menu['child']))<li>@else<li class="treeview">@endif
				<a href="{{ empty($menu['url']) ? 'javascript:void(0)' : url($menu['url']) }}">
					<i class="fa {{ array_get($menu, 'icon') }}"></i>
					<span>{{ $menu['label'] }}</span>
				</a>
				@if(!empty($menu['child']))
					<ul class="treeview-menu">
						@foreach($menu['child'] as $child)
							@if($child['disabled']) continue; @endif
							<li>
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