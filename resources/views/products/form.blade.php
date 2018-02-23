@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Produto</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">

				<div class="form-body">

					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1" data-toggle="tab" aria-expanded="true">Produto</a>
							</li>
							<li class="">
								<a href="#tab_2" data-toggle="tab" aria-expanded="false">Módulos da licença</a>
							</li>
						</ul>
						<div class="tab-content" style="min-height:250px">
							<div class="tab-pane active" id="tab_1">
								{{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('/products/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
									<fieldset>
										<div class="col-sm-12">
											<div class="form-body {{ $errors->first("name", "has-error") }}">
												<label class="control-label">{{ $model->labels['name'] }}  <span class="request">*</span></label>
												{{ Form::text('name', $model->name, ['class' => 'form-control', 'placeholder' => '']) }}
											</div>
										</div>

										<div class="col-sm-12">
											<div class="form-body {{ $errors->first("version", "has-error") }}">
												<label class="control-label">{{ $model->labels['version'] }}  <span class="request">*</span></label>
												{{ Form::text('version', $model->version, ['class' => 'form-control', 'placeholder' => '']) }}
											</div>
										</div>

										<div class="col-sm-12">
											<div class="form-body {{ $errors->first("key", "has-error") }}">
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
									{{ Form::hidden('attributes', json_encode($attributes), ['id' => 'jsonstore']) }}
								
								{{ Form::close() }}
							</div>
							<div class="tab-pane" id="tab_2">
								@include('layout.partials.jsontable', ['rows' => $attributes])
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>