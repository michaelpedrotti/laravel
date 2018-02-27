@include('layout.flash')
<div class="row">
    <title class="hidden">Visualizar Licença</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
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
										@include('licenses.show.default')
									</fieldset>   
								</div>
								<div class="tab-pane" id="tab-license-attributes">
									@include('licenses.show.attributes', [
										'collection' => $attributes,
										'license_id' => $model->id
									])
								</div>
								<div class="tab-pane" id="tab-license-network">
									@include('licenses.show.network')
								</div>
							</div>
						</div>
                    </div>
            </div>
        </div>
    </div>
</div>