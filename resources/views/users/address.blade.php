@section('tab-content')
<div class="tab-pane active">
	{{ Form::open(['method' => 'post', 'url' => url('users/address'), 'class' => 'form-horizontal']) }}
		<div class="form-group {{ $errors->has('cep') ? 'has-error' : '' }}">
			<label class="col-md-3 control-label"><b class="labelSenha">{{ $model->labels['cep'] }} </b></label>
			<div class="col-md-9">
				{{ Form::text('cep', $model->cep, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
				<span class="help-block">{{ $errors->first('cep') }}</span>
			</div>
		</div>
		<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
			<label class="col-md-3 control-label"><b class="labelSenha">{{ $model->labels['address'] }} </b></label>
			<div class="col-md-9">
				{{ Form::text('address', $model->address, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
				<span class="help-block">{{ $errors->first('address') }}</span>
			</div>
		</div>
		<div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
			<label class="col-md-3 control-label"><b class="labelSenha">{{ $model->labels['number'] }} </b></label>
			<div class="col-md-9">
				{{ Form::text('number', $model->number, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
				<span class="help-block">{{ $errors->first('number') }}</span>
			</div>
		</div>
		<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
			<label class="col-md-3 control-label"><b class="labelSenha">{{ $model->labels['city'] }} </b></label>
			<div class="col-md-9">
				{{ Form::text('city', $model->city, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
				<span class="help-block">{{ $errors->first('city') }}</span>
			</div>
		</div>
		<div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
			<label class="col-md-3 control-label"><b class="labelSenha">{{ $model->labels['state_id'] }} </b></label>
			<div class="col-md-9">
				{{ Form::select('state_id', $states, $model->state_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2', 'placeholder' => '']) }}
				<span class="help-block">{{ $errors->first('state') }}</span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn-danger">Alterar</button>
			</div>
		</div>
	{{ Form::close() }}
</div>
@stop
@section('javascript')
<script type="text/javascript">
$(function(e){
	
	$('input[name=cep]').inputmask({mask:"99999-999"});
	$('input[name=number]').inputmask({mask:"9{1,7}"});
});
</script>	
@stop
@include('users.partials.settings', ['expanded' => 'address'])