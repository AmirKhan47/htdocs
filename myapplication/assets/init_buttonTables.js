var TableDatatablesButtons = function () {

    var initTable1 = function () {
        
        window.table = $('#'+table_id);

        table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
           "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "<b>There are not any record.</b>",
                "info": "",
                "infoEmpty": "No records found",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Show _MENU_",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "previous":"Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            buttons: [
            { extend: 'print', className: 'btn dark btn-outline' },
            { extend: 'copy', className: 'btn red btn-outline' },
            { extend: 'pdf', className: 'btn green btn-outline' },
            { extend: 'excel', className: 'btn yellow btn-outline ' },
            { extend: 'csv', className: 'btn purple btn-outline ' },
            { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,

            //"ordering": false, disable column ordering 
            //"paging": false, disable pagination
            
            "order": [
            [0, 'asc']
            ],
            
            "lengthMenu": [
            [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
                ],
            // set the initial value
            "pageLength": 10,

           });

        // handle datatable custom tools
        $('#sale_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            console.log(action);
            table.DataTable().button(action).trigger();
        });
    }
    if(window.arr==1){
        var initTable2 = function () {

         window.table = $('#'+table_id2);

            // begin first table
        //     table.dataTable({
        //        // "paging": false, 
               
        //        "language": {
        //         "aria": {
        //             "sortAscending": ": activate to sort column ascending",
        //             "sortDescending": ": activate to sort column descending"
        //         },
        //         "emptyTable": "<b>There are not any record.</b>",
        //         "info": "",
        //         "infoEmpty": "No records found",
        //         "infoFiltered": "(filtered1 from _MAX_ total records)",
        //         "lengthMenu": "Show _MENU_",
        //         "search": "Search:",
        //         "zeroRecords": "No matching records found",
        //         "paginate": {
        //             "previous":"Prev",
        //             "next": "Next",
        //             "last": "Last",
        //             "first": "First"
        //         }
        //     },
        //     "columnDefs": [ {
        //         "targets": 0,
        //         "orderable": false,
        //         "searchable": false
        //     }],
        //     "aaSorting": []
        // });
            table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
           "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "<b>There are not any record.</b>",
                "info": "",
                "infoEmpty": "No records found",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Show _MENU_",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "previous":"Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            buttons: [
            { extend: 'print', className: 'btn dark btn-outline' },
            { extend: 'copy', className: 'btn red btn-outline' },
            { extend: 'pdf', className: 'btn green btn-outline' },
            { extend: 'excel', className: 'btn yellow btn-outline ' },
            { extend: 'csv', className: 'btn purple btn-outline ' },
            { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,

            //"ordering": false, disable column ordering 
            //"paging": false, disable pagination
            
            "order": [
            [1, 'asc']
            ],
            
            "lengthMenu": [
            [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
                ],
            // set the initial value
            "pageLength": 10,

           });

        // handle datatable custom tools
        $('#sale_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            console.log(action);
            table.DataTable().button(action).trigger();
        });
    }
}
    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }
            initTable1();
            if(window.arr==1){
                initTable2();

                }
        }

    };

}();

jQuery(document).ready(function() {
    TableDatatablesButtons.init();
});