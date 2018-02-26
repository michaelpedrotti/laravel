@include('layout.flash')
<div class="row">
    <title class="hidden">{{ !app_can('ADMIN') ? 'Solicitar' : (empty($model->id) ? 'Cadastrar' : 'Alterar') }}  Licença</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('licenses/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab-license-default" data-toggle="tab" aria-expanded="true">Produto</a>
								</li>
								@can('ADMIN', 'Permission')
								<li class="">
									<a href="#tab-license-attributes" data-toggle="tab" aria-expanded="false">Módulos da licença</a>
								</li>
								@endcan
								<li class="">
									<a href="#tab-license-network" data-toggle="tab" aria-expanded="false">Rede</a>
								</li>
							</ul>
							<div class="tab-content" style="min-height:250px">
								<div class="tab-pane active" id="tab-license-default">
									<fieldset>
										@if(empty($model->id))
											@include('licenses.form.default')
										@else
											@include('licenses.show.default')
										@endif
									</fieldset>   
								</div>
								@can('ADMIN', 'Permission')
								<div class="tab-pane" id="tab-license-attributes">
									@if(!empty($model->id))				
										@include('licenses.product-attributes', [
											'collection' => $attributes,
											'license_id' => $model->id
										])
									@endif
								</div>
								@endcan
								<div class="tab-pane" id="tab-license-network">
									<div class="form-body">
										<label class="control-label">IP/Rede</label>
										<div class="input-group">
											{{ Form::text('network', '', ['class' => 'form-control ip']) }}
											<a href="javascript:void(0)" data-action="add-network" class="input-group-addon btn btn-link btn-default">
												<i class="fa fa-plus"></i>	
											</a>
										</div>
									</div>
									
									<fieldset id="license-network-items">
										{{ print_r( $networks )}}
										@if(!empty($networks) && !app('request')->isMethod('post'))
											@include('licenses.form.network')
										@endif
									</fieldset>
								</div>
							</div>
						</div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>