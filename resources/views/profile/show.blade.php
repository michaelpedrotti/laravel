@extends('layout.master')
@section('conteudo')
    @include('layout.erros')

    <?php
    echo LayoutBuilder::gerarBreadCrumb(array(
        'Início' => url('default/index'),
        'Lista de Perfis' => url('perfil/index'),
        'Visualizar perfil',
    ));
    ?>
    @if($errors->all())
        @foreach ($errors->keys() as $key)
            <?php
            ${$key} = "has-error";
            ?>
        @endforeach
    @endif
@section('javascript')
    {!!Html::script('resources/assets/js/perfil/show.js')!!}
@stop
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-orange-sharp bold uppercase">Visualizar perfil</span>
                </div>
            </div>
            <input type="hidden" value="{{$model->id}}" class="perfil_id"/>
            <div class="portlet-body">
                <div class="col-md-12">
                    <fieldset>
                        <div class="col-sm-6">
                            <div class="form-body">
                                <label class="control-label">{{ $model->labels['nome'] }} </label>
                                <div class="form-control">{{ $model->nome }}</div>
                            </div>
                        </div>

                    </fieldset>
                </div>
            </div>
            
            <div class="clearfix" style="margin-bottom:30px"></div>

            <div class="portlet-body">
                <div class="tabbable-custom ">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#tab_1_1_1" data-toggle="tab" aria-expanded="true"> Permissões </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1_1">
                            @include('perfil.show.permissoes')
                        </div>
                    </div>
                </div>

            </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('perfil/index') }}">
                        <button type="button" class="btn btn-default">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

