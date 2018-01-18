@include('layout.flash')
<div class="row">
    <title class="hidden">{{ empty($model->id) ? 'Cadastrar' : 'Alterar' }}  Permissão do Perfil</title>
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {{ Form::open(['method' => 'post', 'data-action' => 'form-ajax', 'url' => url('acl-permissions/form', ['id' => $model->id]), 'class' => 'form-horizontal', 'files' => true]) }}
                    <div class="form-body">

                        <div class="col-md-12">
                            <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("acl_id", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['acl_id'] }}  <span class="request">*</span>:</label>
                                            {{ Form::select('acl_id', \App\Models\Acls::getModel()->consultar()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->acl_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-body {{ $errors->first("permission_id", "has-error") }}">
                                            <label class="control-label">{{ $model->labels['permission_id'] }}  <span class="request">*</span>:</label>
                                            {{ Form::select('permission_id', \App\Models\Permissions::getModel()->consultar()->pluck('id', 'id')->prepend('Selecione', '')->toArray(), $model->permission_id, ['data-required' => 1,'aria-required' => 'true' ,'class' => 'form-control select2']) }}
                                        </div>
                                    </div>
                                                  
                            </fieldset>    
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>