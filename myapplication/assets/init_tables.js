var TableDatatablesManaged = function () {

    var initTable1 = function () {

         window.table = $('#'+table_id);

            // begin first table
            table.dataTable({
               // "paging": false, 
               
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
            "columnDefs": [ {
                "targets": 0,
                "orderable": false,
                "searchable": false
            }],
            "aaSorting": [],
            "pageLength": 50
        });
    }

if(window.arr==1){
        var initTable2 = function () {

         window.table = $('#'+table_id2);

            // begin first table
            table.dataTable({
               // "paging": false, 
               
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
            "columnDefs": [ {
                "targets": 0,
                "orderable": false,
                "searchable": false
            }],
            "aaSorting": []
        });
}
}
if(window.arr==3){
        var initTable4 = function () {

         window.table = $('#'+table_id4);

            // begin first table
            table.dataTable({
               // "paging": false, 
               
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
            "columnDefs": [ {
                "targets": 0,
                "orderable": false,
                "searchable": false
            }],
            "aaSorting": []
        });
}
}
    if(window.arr==2){
        var initTable3 = function () {

         window.table = $('#'+table_id3);

            // begin first table
            table.dataTable({
               // "paging": false, 
               
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
            "columnDefs": [ {
                "targets": [0,2],
                "orderable": false,
                "searchable": false
            }],
            "aaSorting": []
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

                if(window.arr==2){
                initTable3();
                }   
                 if(window.arr==3){
                initTable4();

                }
             }
        };
    }();

    if (App.isAngularJsApp() === false) { 
        jQuery(document).ready(function() {
            TableDatatablesManaged.init();
        });
    }
    
