@if($collection->count() > 0)
	@foreach($collection as $model)
		<div class="form-check">
			<input type="checkbox" name="attributes[{{ $model->id }}]" class="form-check-input" id="license-checkbox-{{ $model->id }}">
			<label class="form-check-label" for="license-checkbox-{{ $model->id }}" style="font-weight:normal">{{ $model->name }}</label>
		</div>
	@endforeach
@else
<p>Nenhum atributo foi cadastrado neste produto.</p>
@endif