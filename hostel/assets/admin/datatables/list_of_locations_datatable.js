$(document).ready(function()
{
    var ltable = $('#list_of_locations_datatable');
    var leadtable=ltable.DataTable(
    {
        "pageLength": 10,
        "bInfo": true,
        "fnDrawCallback": function(oSettings) 
        {
            if (oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()) 
            {
                $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
            }
        },
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax":
        {
            "url": window.location.origin+"/hostel/backend/admin/location/get_list_of_locations",
            "type": "POST"
        },
        "oLanguage": 
            {
                sProcessing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
            },
        //Set column definition initialisation properties.
        "columnDefs": [ 
            // { "targets": [3],"orderable": false,},
            // { "targets": [5],"orderable": false,},
            // { "targets": [6],"orderable": false,},
            // { "targets": [7],"orderable": false,},
        ],
        // "fixedColumns":   true,
        // "scrollY":        "400px",
        // "scrollX":        true,
        // "scrollCollapse": true,
        // "paging":         false,
    });
    //////////Advance search/////////////
    function filterColumn ( i )
    {
        $('#list_of_locations_datatable').DataTable().column( i ).search(
            $('#id'+i).val()
        ).draw();
    }
    $(document).ready(function()
    {
        $('input.column_filter').on( 'keyup', function ()
        {
            filterColumn( $(this).attr('data-column') );
        });
    });
    $.fn.dataTable.ext.errMode = 'none';
});