var oTable = configTable();//Seta a configuração do datatables

$(document).ready(function() {

    $(document).on('click', '.destroyTr', destroyTr);
    
    $('#data_table_filter').find('select').change(function(e){
        
        var table = $('#data_table').DataTable().draw();
    });
});

/**
 * Destroy o item da modelo
 * @returns {undefined}
 */
function destroyTr() {
    var id = $(this).attr('data-rel');
    
    confirmBox('Deseja realmente excluir este Usuário?', function(retorno) {
        if (retorno) {
            $.ajax({
                url: APP.controller_url + '/destroy/'+id
            }).done(function(data) {
                createFlashMesseger(data.msg, '#flashMensager', data.success);
                oTable.draw();
            });
        } 
     });
}

/**
 * Monta config do DataTables
 * @returns {unresolved}
 */
function configTable() {
    return $('#data_table').DataTable({
        dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>" +
             "<'row'<'col-xs-12't>>" +
             "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        ajax: {
            url: APP.controller_url + '/index',
            data: function (data) {
                
                $.each($('#data_table_filter').serializeArray(), function(index, obj){
                    data[obj.name] = obj.value;
                });
            }
        },
        columns: [
        
            {data:'id', name:'id', className:'text-left'},
        
            {data:'name', name:'name', className:'text-left'},
        
            {data:'email', name:'email', className:'text-left'},
        
            {data:'password', name:'password', className:'text-left'},
        
            {data:'remember_token', name:'remember_token', className:'text-left'},
            {data:'acoes', name:'botoes', className:'text-center'}
        ]
    });
}