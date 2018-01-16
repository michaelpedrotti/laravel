if(!APP) var APP = {};

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

//------------------------------------------------------------------------------
// CRUD Básico
//------------------------------------------------------------------------------
if(!APP.Crud) APP.Crud = {};

APP.Crud.url = '';

APP.Crud.CheckAll = function(){
    
    var checkbox = $(this);
    var fn;
    
    if(checkbox.is(':checked')) {

        fn = function(checkbox){
            
            checkbox.attr('checked', 'checked');
        };
    }
    else {

        fn = function(checkbox){
            
            checkbox.removeAttr('checked');
        };
    }
    
    checkbox.parents('table:first').find('tbody').find('input[type=checkbox]').each(function(index, el){
        fn($(this));
    });    
};

APP.Crud.Save = function(){
    
    var button = $(this);    
    button.attr('disabled', 'disabled');
    
    var form = $('#modal-default').find('form:first');
    var data = new FormData(form.get(0));
    
    $.ajax({

        method:"POST",
        type:"POST",
        url:form.attr('action'),
        dataType:'html',
        data:data,
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

            alert('error');
         }, 
         success:function(content, textStatus, jqXHR){
            
            var alert = $(content).find('.alert-success');

            if(alert.length > 0) {
                
                APP.flash(alert.text(), 'success');
                
                $('#modal-default').modal('hide');
                $('table.dataTable').DataTable().ajax.reload();
            }
            else {

                $('#modal-default .modal-body').empty().html(content);
            }
        }  
    });
};

APP.Crud.Load = function(){
    
    $.ajax({

        method:'GET',
        url:APP.Crud.url,
        dataType:'html',
        headers: {
            'X-CSRF-TOKEN':APP.token
        },
        error:function(){

            alert('error');
        }, 
        success:function(content){

            var selector = $(content).find('title:first');
            
            if(selector.length > 0) {
                $('#modal-default .modal-title').html(selector.html()); 
            }

            $('#modal-default .modal-body').html(content);
        }  
    });
};

APP.Crud.Show = function(){
    
    var button = $(this);
    var container = button.parents('div.box');
    
    var selector = container.find('tbody').find('input[type=checkbox]:checked');

    if(selector.length <= 0) {
        APP.flash('Selecine um registro', 'warning');
        return false;
    }

    APP.Crud.url = APP.current_controller + '/show/' + selector.first().val();
    
    $('a[data-action=save], button[data-action=save]').hide();
    
    selector = $('#modal-default');
    
    selector.find('.modal-body').empty().html('Carregando...');
    selector.modal('show'); 
};

APP.Crud.Create = function(){
      
    APP.Crud.url = APP.current_controller + '/form';
    
   $('a[data-action=save], button[data-action=save]').show();
    
    var selector = $('#modal-default');
    
    selector.find('.modal-body').empty().html('Carregando...');
    selector.modal('show'); 
};

APP.Crud.Edit = function(){
    
    var button = $(this);
    var container = button.parents('div.box');
    
    var selector = container.find('tbody').find('input[type=checkbox]:checked');

    if(selector.length <= 0) {
        APP.flash('Selecine um registro', 'warning');
        return false;
    }

    APP.Crud.url = APP.current_controller + '/form/' + selector.first().val();
    
    $('a[data-action=save], button[data-action=save]').show();
    
    selector = $('#modal-default');
    
    selector.find('.modal-body').empty().html('Carregando...');
    selector.modal('show'); 
};

APP.Crud.Remove = function(e){
    
    var button = $(this);
    var container = button.parents('div.box');
    var selector = container.find('tbody').find('input[type=checkbox]:checked');
    
    if(selector.length <= 0){
        APP.flash('Selecine um registro', 'warning');
        return false;
    }
    
    var datatable = container.find('table').DataTable();
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

            alert('error');
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

$(document).ready(function() {
    
    $("table.dataTable").on('draw.dt', function(){
   
        $(this).find('input[data-check-all]').click(APP.Crud.CheckAll);
    });
    
    $('#modal-default').on('shown.bs.modal', APP.Crud.Load);
    
    $(document).on('click', 'a[data-action=save], button[data-action=save]', APP.Crud.Save);
    $('a[data-action=show], button[data-action=show]').click(APP.Crud.Show);
    $('a[data-action=create], button[data-action=create]').click(APP.Crud.Create);
    $('a[data-action=edit], button[data-action=create]').click(APP.Crud.Edit);
    //$('a[data-action=remove], button[data-action=remove]').click(APP.Crud.Remove); 
    
    
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
});
//------------------------------------------------------------------------------
