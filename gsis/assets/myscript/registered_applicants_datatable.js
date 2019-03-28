$(document).ready(function()

{

    $('#registered_applicants_datatable').DataTable(

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

            "url": window.location.origin+"/gsis/recruitment/registered_applicants/",

            // "url": "http://www.redstartechs.org/gsis/staging/recruitment/registered_applicants/",

            "type": "POST"

        },

        "oLanguage": 

        {

            sProcessing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

        },

    });

});