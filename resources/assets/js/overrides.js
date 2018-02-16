$.extend( true, $.fn.dataTable.defaults, {
    dom:"<'row'<'col-xs-12't>>" +
        "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: false,
    serverSide: true,
    searching: false,
    ordering: true,
    paging: true,
    pageLength: 25,
    cache:false,
    drawCallback: function() {
       
       $('input[data-check-all]').click(APP.Crud.CheckAll);
    },
    ajax: {
        type:"POST"
    },
    columnDefs: [
        {
            targets: 0,
            searchable: false,
            orderable: false,
            className: 'select-checkbox',
            width:'20px',
            render: function (value){	 
                return '<input type="checkbox" class="checkbox" name="id[]" value="' + value + '">';
            }
        }
    ],
    headerCallback: function(thead) {
        $(thead).find('th').eq(0).html('<input type="checkbox"  data-check-all="true" class="checkbox" /">');
    },
    language: { url: "/assets/js/datatables-ptBR.json" },
    order:[]
});