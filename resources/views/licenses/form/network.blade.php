@foreach($networks as $network)
	<div class="form-body" style="margin-top: 5px">
		<div class="input-group">
			<div class="form-control">{{ $network }}</div>
			<a href="javascript:void(0)" data-action="rem-network" class="input-group-addon btn btn-link btn-default">
				<i class="fa fa-minus"></i>	
			</a>
			{{ Form::hidden('networks[]', $network) }}
		</div>
	</div>
@endforeach