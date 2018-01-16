@extends('layout.master')
@section('conteudo')

<?php
echo LayoutBuilder::gerarBreadCrumb(array(
    'Início' => url('perfil/index'),
    'Lista de Perfis',
));
?>
@section('javascript')
{!!Html::script('resources/assets/js/perfil/index.js')!!}
@stop

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        
        <?php echo Util::showMessage(); ?>        
        <div class="portlet light bordered">
            
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-blue-sharp bold uppercase">Listar perfil</span>
                </div>
            </div>

            <div class="table-toolbar">
                
                <div class="row">
                    <div class="tab-pane active">
                        <div class="portlet box blue ">
                            <div class="portlet-title pesquisa-avancada" onclick="document.getElementById('conteinerCollapse').click()">
                                <div class="caption">
                                    <i class="fa fa-search"></i>Filtrar </div>
                            </div>
                            <div class="portlet-body">
                                <form id="data_table_filter" accept-charset="UTF-8" class="item_form form-horizontal">
                                    <div class="form-body">
                                        <div class="col-md-12">

                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="col-sm-6"> 
                                                       <label class="control-label">{{ $model->labels['nome'] }}:</label>
                                                        <div>
                                                            {{ Form::text('nome', null, ['data-requireda' => 1, 'aria-required' => 'true' , 'class' => 'form-control', 'placeholder' => 'Nome']) }}
                                                        </div> 
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="form-actions left">
                                        <button type="button" id="data_table_search" class="btn sbold orange"><i class="fa fa-search"></i> Pesquisar</button>
                                        <button type="button" id="data_table_clear" class="limpar btn btn-default"><i class="fa fa-eraser"></i> Limpar</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group" >
                           
                                <a href="{{ url('perfil/form') }}">
                                    <button class="btn sbold orange"> Adicionar
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </a>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="portlet-body">
                {!! $dataTable->table(['class' => 'table table-striped table-bordered table-hover order-column', 'id' => 'data_table']) !!}
            </div>
        </div>
    </div>
</div>

@stop
