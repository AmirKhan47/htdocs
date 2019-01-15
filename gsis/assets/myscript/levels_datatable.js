$(document).ready(function()
{
    $('#levels_datatable').DataTable(
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
          "url": "http://localhost/gsis/level/get_levels/",
          // "url": "http://www.redstartechs.org/gsis/staging/levels/get_levels/",
          "type": "POST"
        },
        "oLanguage": 
            {
                sProcessing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
            },
    });
});