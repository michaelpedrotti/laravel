@if($collection && $collection->count() > 0)
	@foreach($collection as $_model)
		<div class="col-sm-12">
			<span class="fa {{ $_model->isCheck($license_id) ? 'fa-check-square' : 'fa-square' }}"></span>
			<label class="form-check-label" style="font-weight:normal">{{ $_model->name }}</label>
		</div>
	@endforeach
@else
<p>Nenhum atributo foi cadastrado neste produto.</p>
@endif