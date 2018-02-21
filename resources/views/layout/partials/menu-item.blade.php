@if(isset($node['disabled']) && !empty($node['disabled']))
@else
	@php $url = array_get($node, 'url', ''); @endphp
	<li data-route="{{ $url }}" class="{{ array_get($node, 'child') ? 'treeview': '' }}">
		<a href="{{ $url ? url('/' . $url) : 'javascript:void(0)' }}">
			<i class="fa {{ array_get($node, 'icon') }}"></i>
			<span>{{ array_get($node, 'label') }}</span>
		</a>
		@if(!empty($node['child']))
			<ul class="treeview-menu">
				@foreach($node['child'] as $child)
					@include('layout.partials.menu-item', ['node' => $child])
				@endforeach
			</ul>
		@endif
	</li>
@endif