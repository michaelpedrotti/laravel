@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Produto</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('/products/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
				<div class="form-body">
					<fieldset>
						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("name", "has-error") }}">
								<label class="control-label">{{ $model->labels['name'] }}  <span class="request">*</span></label>
								{{ Form::text('name', $model->name, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="form-body {{ $errors->first("version", "has-error") }}">
								<label class="control-label">{{ $model->labels['version'] }}  <span class="request">*</span></label>
								{{ Form::text('version', $model->version, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control', 'placeholder' => '']) }}
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="form-bodyy {{ $errors->first("key", "has-error") }}">
								<label class="control-label">Chave</label>
								@if(!empty($model->id))
									<div class="input-group">
										{{ Form::file('key', ['class' => 'form-control']) }}
										<a href="{{ url('/products/download', ['id' => $model->id]) }}" title="Baixar a licença" class="input-group-addon btn btn-link btn-default">
											<i class="fa fa-download"></i>	
										</a>
									</div>
								@else
								{{ Form::file('key', ['class' => 'form-control']) }}
								@endif
							</div>
						</div>
					</fieldset>    
				</div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>