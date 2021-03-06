if(!APP) var APP = {};

APP.getNs = function(str){
    
    var current = window;
    
    $.each(str.split('.'), function(index, namespace){
        if(current[namespace]) {
            switch(typeof(current[namespace])) {
                case 'object':
                    current = current[namespace];
                    break;
                    
                case 'function':
                    current = current[namespace];
                    return false;
                    break;
            }
        }
    });
    
    return current;
};

APP.ns = function(str){
    
    var current = window;
    
    $.each(str.split('.'), function(index, namespace){
        if(!current[namespace]) {
            current[namespace] = {};
        }
        current = current[namespace];
    });
    
    return current;
};

/**
 * Envia uma mensagem de alerta para o usuário
 * 
 * @param {String} mensage
 * @param {String} level
 * @return {null} description
 */
APP.flash = function(message, level) {

//    $('#flash-messager').append($.parseHTML(
//        '<div class="alert alert-' + level + '">' +
//        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
//        '<i class="fa fa-'+ level +'"></i> ' + message +
//        '</div>'
//    ));
//    
//    window.scrollTo(0, 0);

    $.notify({ message:message }, {
        type:level,
        delay:10000,
        animate: {
            enter:'animated fadeInDown',
            exit:'animated fadeOutUp'
        }
    });
};

/**
 * Recarrega um combo por Ajax
 * 
 * @param {String} selector
 * @param {String} model
 * @param {Object} parametros adicionais para a ajax.request
 * @param {function} callback
 * @return {null} description
 */
APP.loadCombo = function(selector, model, data, callback) {

    var combo = $(selector);
    combo.attr('readonly', 'readonly');
    combo.empty();

    var data = data || {value:'id', text:'name'};
    data._token = APP.token;

    $.ajax({
        type: "POST",
        url: APP.base_url + 'helper/load-combo/' + model,
        dataType: "json",
        data: data,
        success: function (resp) {

            if (resp.success && resp.options) {

                combo.append($('<option>', {value: '', text: 'Selecione'}));

                $.each(resp.options, function (value, text) {
                    combo.append($('<option>', {value: value, text: text}));
                });

                if (typeof(callback) == 'function') {
                    callback(resp, combo);
                }
            }
        },
        complete: function () {

            combo.removeAttr('readonly');
        },
        error: function (jqXHR) {

            APP.flash('Falha ao carregar o combo', 'warning');
        }
    });
};

/**
 * Abre o menu-bar baseado na rota
 * 
 * @return {null} description
 */
APP.openMenu = function(){
    
    var selector = $('li[data-route*="' + APP.controller + '"]');
    
    if(selector.length > 0) {
        
        selector.each(function(index, el){
            
            $(el).addClass('active')
                .closest('li.treeview')
                    .addClass('active menu-open');
            
        });
    }
};

//------------------------------------------------------------------------------
// CRUD Básico
//------------------------------------------------------------------------------
if(!APP.Crud) APP.Crud = {};

APP.Crud.url = '';

APP.Crud.getSelected = function(button){
 
    var table = $(button.attr('data-table') || 'table.dataTable');
    var selector = table.find('tbody').find('input[type=checkbox]:checked');

    if(selector.length <= 0) {
            APP.flash('Selecine um registro', 'warning');
            return false;
    }

    return selector.first().val();
};

/**
 * Carrega o formuário para cadastrar um registro
 * 
 * @target .modal .form-horizontal
 */
APP.Crud.Create = function(){
   
    var button = $(this);
    var modal = $(button.attr('data-modal') || '#modal-primary');
    APP.Crud.url = button.attr('data-url') || APP.current_controller + '/form';
    
    modal.find('a[data-action=save], button[data-action=save]').show();
    modal.find('.modal-body').empty().html('Carregando...');
    modal.modal({
        show:true, 
        callback:button.attr('fn-callback'),
        button:button
    }); 
};

/**
 * Carrega o formuário com os dados para editar um registro
 * 
 * @target .modal .form-horizontal
 */
APP.Crud.Edit = function(){
    
    var button = $(this);
    var modal = $(button.attr('data-modal') || '#modal-primary');
    var id = APP.Crud.getSelected(button);

    if(!id) return false;

    APP.Crud.url = APP.current_controller + '/form/' + id;
    
    modal.find('a[data-action=save], button[data-action=save]').show();
    modal.find('.modal-body').empty().html('Carregando...');
    modal.modal('show'); 
};

/**
 * Visualiza os dados de um registro
 * 
 * @target .modal .form-horizontal
 */
APP.Crud.Show = function(){
    
    var button = $(this);
    var modal = $(button.attr('data-modal') || '#modal-primary');
    var id = APP.Crud.getSelected(button);
    
    if(!id) return false;

    APP.Crud.url = APP.current_controller + '/show/' + id;
    
    modal.find('a[data-action=save], button[data-action=save]').hide();
    modal.find('.modal-body').empty().html('Carregando...');
    modal.modal('show'); 
};

/**
 * Carrega os dados do backend em um formulário. Invodado pelo Edit ou Create
 * 
 * @target .modal .form-horizontal
 */
APP.Crud.Load = function(e){
    
    var modal = $(e.currentTarget);
    
    $.ajax({

        method:'GET',
        url:APP.Crud.url,
        dataType:'html',
        headers: {
            'X-CSRF-TOKEN':APP.token
        },
        error:function(jqXHR, textStatus, errorThrown){
            
            modal.find('a[data-action=save], button[data-action=save]').hide();
            modal.find('.modal-title').html(errorThrown); 
            modal.find('.modal-body').html('<pre>' + jqXHR.responseText + '</pre>');            
        }, 
        success:function(content){

            var selector = $(content).find('title:first');
            
            if(selector.length > 0) {
                modal.find('.modal-title').html(selector.html()); 
            }

            var body = modal.find('.modal-body').html(content);
            
            APP.Crud.Bootstrap(body);
        }  
    });
};

/**
 * Salva os dados de um registro no backend. Tanto se for cadastro como edição
 * 
 * @target .modal .form-horizontal
 */
APP.Crud.Save = function(){

    var button = $(this);// Botão Salvar
    var modal = $(button.attr('data-modal') || '#modal-primary');
    var form = modal.find('form:first');

    button.attr('disabled', 'disabled');
    
    $.ajax({

        method:"POST",
        type:"POST",
        url:form.attr('action'),
        dataType:'html',
        data:new FormData(form.get(0)),
        processData: false,
//        contentType: 'multipart/form-data',
        contentType: false,
        headers: {
            'X-CSRF-TOKEN':APP.token
         },
        complete:function() {
             
            button.removeAttr('disabled');
         },
        error:function(jqXHR, textStatus, errorThrown){

            $('a[data-action=save], button[data-action=save]').hide();
            modal.find('.modal-title').html(errorThrown); 
            modal.find('.modal-body').html('<pre>' + jqXHR.responseText + '</pre>');
         }, 
        success:function(content, textStatus, jqXHR){
            
            // Verifica se tem o alerta de sucesso no HTML de retorno
            var alert = $(content).find('.alert-success');
            if(alert.length > 0) {
                
                // Imprime a mensagem de sucesso
                APP.flash(alert.text(), 'success');
                
                // Fecha a janela
                modal.modal('hide');
                
                // Verifica nas opções da modal, quando ela foi criada, se não
                // foi injetado um callback especifico. Geralmente usado na modal-secundary
                var options = modal.data('bs.modal').options;

                if(options.callback) {
                    var callback = APP.getNs(options.callback);
                    if(typeof(callback) == 'function') {
                        callback(options.button);// Botão que chamou a modal
                    }
                }
                else {
                    // Recarrega a grade
                    APP.Crud.Refresh(button);// Botão Salvar
                }
            }
            // Senão houve um erro e o formulário atualizado pois tera os alertas
            // de erro
            else {

                var target = modal.find('.modal-body').empty().html(content);
                // Execuda mascarás e demais eventos que não foram atachados 
                // no formulário carregado por ajax
                APP.Crud.Bootstrap(target);
            }
        }  
    });
};

/**
 * Apaga registros selecionados no datatable
 * 
 * @target .datatable
 */
APP.Crud.Remove = function(e){
    
    var button = $(this);
    var table = $(button.attr('data-table') || 'table.dataTable');
    var selector = table.find('tbody').find('input[type=checkbox]:checked');
    
    if(selector.length <= 0){
        APP.flash('Selecine um registro', 'warning');
        return false;
    }
    
    var datatable = table.DataTable();
    var data = {};
    var length = 0;
    
    selector.each(function(index, el){
        data['id[' + index + ']'] = $(el).val();
        length++;
    });
    
    button.attr('disabled', 'disabled');
    
    $.ajax({
        type:'POST',
        url:APP.current_controller + '/remove',
        data: data,
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN':APP.token
         },
         complete:function() {
            button.removeAttr('disabled');
         },
         error:function(jqXHR, textStatus, errorThrown){

            APP.flash(errorThrown, 'danger');
         }, 
         success:function(data){
             
            if(data.success) {

                APP.flash(data.msg, 'success');
                datatable.ajax.reload();
            }
            else {
                
                APP.flash(data.msg, 'danger');
            }
        }  
    });
};


APP.Crud.afterLoadQueue = [];

APP.Crud.AddAfterLoad = function(func){
    if(typeof(func) == 'function') {   
        APP.Crud.afterLoadQueue.push(func);
    }
}

/**
 * Ao carregar campos por ajax os eventos não são atachados e em alguns momentos
 * o delegate não funciona. Então atachamos os eventos manualmente
 * 
 * @target .modal .form-horizontal
 * @param {String} context query para o selector jquery 
 * @return {null}
 */
APP.Crud.Bootstrap = function(selector){
    
    selector.find(".datepicker").datepicker($.fn.datepicker.dates['pt-BR']);
    selector.find('.datepicker').inputmask("99/99/9999");
    selector.find('.cnpj').inputmask('99.999.999/9999-99');
    selector.find('.ip').inputmask('9{1,3}.9{1,3}.9{1,3}.9{1,3}');
    selector.find('.network').inputmask('9{1,3}.9{1,3}.9{1,3}.9{1,3}[/9{1,2}]');
    selector.find(".integer").inputmask('integer', {min:1, max:99999});
    
    $.each(APP.Crud.afterLoadQueue, function(index, func){
        if(typeof(func) == 'function') {
            func(selector); 
        }
    });
};

APP.Crud.Refresh = function(button){
    
    var table = $(button.attr('data-table') || 'table.dataTable');
    table.DataTable().ajax.reload();
};

/**
 * Marca todos os checkbox da pagina atual do datatable
 * 
 * @target .datatable
 */
APP.Crud.CheckAll = function(){
    
    var checkbox = $(this);
    var fn;
    
    if(checkbox.is(':checked')) {

        fn = function(checkbox){ checkbox.get(0).checked = true; };
    }
    else {

        fn = function(checkbox){ checkbox.get(0).checked = false; };
    }
    
    checkbox.parents('table:first').find('tbody').find('input[type=checkbox]').each(function(index, el){
        fn($(this));
    });    
};

/**
 * Adiciona os campos de um formulário ao filtro de pesquisa do datatables
 * 
 * @target .datatable
 */
APP.Crud.Search = function(e){
    
    $('section.content')
        .find('table.dataTable')
            .DataTable()
                .ajax
                    .reload();
};

/**
 * Limpa os campos de um formulário e recarrega o datatable sem os filtros
 * 
 * @target .datatable
 */
APP.Crud.Reset = function(e){
    
    var container = $('section.content');
    
    container.find('form.form-horizontal').get(0).reset();
    container.find('table.dataTable').DataTable().ajax.reload();
};

//------------------------------------------------------------------------------
// JSON GRID + FORM
//------------------------------------------------------------------------------
if(!APP.Json) APP.Json = {};

APP.Json.Add = function(){
	
    var button = $(this);
    var form = button.closest('form');
    var table = $(button.attr('data-table'));
    var field = $(button.attr('data-store'));
    var html = '<tr>';
    var rows = JSON.parse(field.val() || []);
    var row = {};

    $.each(form.serializeArray(), function(index, obj){
        
        // @todo: required
        row[obj.name] = obj.value;
        html += '<td>' + obj.value + '</td>';
    });

    form.get(0).reset();

    rows.push(row);

    field.val(JSON.stringify(rows));

    html += '<td>';
    html += '<a href="javascript:void(0)" data-action="json-rem" data-store="' + button.attr('data-store') +'" class="btn btn-xs btn-danger">';
    html += '<i class="fa fa-remove"></i></a>';
    html += '</td>';
    html += '</tr>'; 

    table.find('tbody').append(html);		
};

APP.Json.Rem = function(){
    
    var button = $(this);
    var field = $(button.attr('data-store'));
    //var table = button.closest('table');
    var tr = button.closest('tr');
    var index = tr.index();
    var rows = [];

    tr.remove();
   
    $.each(JSON.parse(field.val() || []), function(key, obj){			
            if(index != key) rows.push(obj);
    });

    field.val(JSON.stringify(rows));
};

//------------------------------------------------------------------------------
/**
 * Contrutor para atachar os eventos
 * 
 */
$(document).ready(function() {
    
    $("table.dataTable").on('draw.dt', function(){
   
        $(this).find('input[data-check-all]').click(APP.Crud.CheckAll);
    });
        
    $("table.dataTable").on('dblclick','td',function(e){
        
        var col = $(this);
        
        if(col.index() <= 0) return false;
        
        var row = $(this).closest('tr');
        var input = row.find('input[type=checkbox]');
        
        if(input.is(':checked')){
            input.get(0).checked = false;
        }
        else {
            input.get(0).checked = true;
        }
    });
    
    
    $('.modal').on('shown.bs.modal', APP.Crud.Load);
    
    $('a[data-action=save], button[data-action=save]').click(APP.Crud.Save);
    $('a[data-action=show], button[data-action=show]').click(APP.Crud.Show);
    
    $(document).on('click', 'a[data-action=create], button[data-action=create]',  APP.Crud.Create);
    $('a[data-action=edit], button[data-action=edit]').click(APP.Crud.Edit);
    $('a[data-action=search], button[data-action=search]').click(APP.Crud.Search);
    $('a[data-action=reset], button[data-action=reset]').click(APP.Crud.Reset);   
    $('a[data-action=remove], button[data-action=remove]').confirmation({
        rootSelector:'[data-action=create]',
        placement:'left',
        title: 'Remover registros selecionado?',
        btnOkClass: 'btn btn-sm btn-danger',
        btnOkLabel: 'Apagar',
        btnOkIcon: 'glyphicon glyphicon-ok',
        btnCancelClass: 'btn btn-sm btn-default',
        btnCancelLabel: 'Cancelar',
        btnCancelIcon: 'glyphicon glyphicon-remove',
        popout: true
        
    }).on('confirmed.bs.confirmation', APP.Crud.Remove);
    
    $(document).on('click', 'button[data-action=json-add], a[data-action=json-add]', APP.Json.Add);
    $(document).on('click', 'button[data-action=json-rem], a[data-action=json-rem]', APP.Json.Rem);
    
    APP.openMenu();
    
    APP.Crud.Bootstrap($(document));
});