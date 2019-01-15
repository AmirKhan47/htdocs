var ltable = $('#target-table');
var url=$('#url').val();
var fixedHeaderOffset = 0;
    if (App.getViewPort().width < App.getResponsiveBreakpoint('md')) {
        if ($('.page-header').hasClass('page-header-fixed-mobile')) {
            fixedHeaderOffset = $('.page-header').outerHeight(true);
        } 
    } else if ($('.page-header').hasClass('navbar-fixed-top')) {
        fixedHeaderOffset = $('.page-header').outerHeight(true);
    }
var leadtable=ltable.DataTable({ 
    "pageLength": 10,
    "bInfo": true,

              
    "fnDrawCallback": function(oSettings) {                 
        if (oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()) {
            $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
        }
    },
    fixedHeader: {
        header: true,
        footer: true,
        headerOffset: fixedHeaderOffset
    },
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
    "ajax": {
    "url": url+"target/get_target/",
    "type": "POST"
    },
    oLanguage: {
        sProcessing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
    },

                //Set column definition initialisation properties.
    "columnDefs": [ 
        { "targets": [1],"orderable": false,},
        { "targets": [2],"orderable": false,},
                   
    ],       
});
$.fn.dataTable.ext.errMode = 'none';