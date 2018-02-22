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
						<div class="tab-content">
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
									{{ Form::hidden('attributes', '[]', ['id' => 'jsonstore']) }}
								
								{{ Form::close() }}
							</div>
							<div class="tab-pane" id="tab_2">
								<form>
									<div class="col-sm-5" style="padding-left:0">
										{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome']) }}
									</div>
									<div class="col-sm-5" style="padding-left:0">
										{{ Form::text('key', '', ['class' => 'form-control', 'placeholder' => 'Attributo']) }}
									</div>
									<div class="col-sm-2" style="padding-right:0">
										<a href="javascript:void(0)" data-action="json-add" data-table="#jsontable" data-store="#jsonstore" class="btn btn-success  pull-right">
											<i class="fa fa-plus"></i>
										</a>
									</div>
									<div class="clearfix" style="margin-bottom:10px"></div>
								</form>
								<table id="jsontable" class="table">
									<thead>
										<tr>
											<th style="width:50%">Nome</th>
											<th style="width:50%">Atributo</th>
											<th style="width:10px"></th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>