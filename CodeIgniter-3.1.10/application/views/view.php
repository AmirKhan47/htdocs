<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lead Table</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Lead Generation Table</h1>
				<div class="offset-5 mt-3 col-2"><a href="http://localhost/CodeIgniter-3.1.10/welcome"><button type="button" id="btn" class="btn btn-primary">Add Lead</button></a></div>
		</div>
		<!-- <div class="table-responsive"> -->
			<!-- <select name="date" class="form-group">
				<option value="">Choose Date</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select> -->
			<table id="table" class="table table-sm table-hover table-bordered">
				<thead>
					<tr>
						<th>Date</th>
						<th>Lead Origin</th>
						<th>Lead Area</th>
						<th>City</th>
						<th>Query</th>
						<th>Client Name</th>
						<th>Contact</th>
						<th>Note</th>
						<th>Posted</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		<!-- </div> -->
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
		    var ltable = $('#table');
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
		            "url": 'http://localhost/CodeIgniter-3.1.10/welcome/get_list_of_lead',
		            "type": "POST"
		        },
		        "oLanguage": 
		            {
		                sProcessing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
		            },
		        //Set column definition initialisation properties.
		        // "columnDefs": [ 
		            // { "targets": [4],"orderable": false,},
		            // { "targets": [5],"orderable": false,},
		            // { "targets": [6],"orderable": false,},
		            // { "targets": [7],"orderable": false,},
		        // ],
		        // "fixedColumns":   true,
		        // "scrollY":        "400px",
		        // "scrollX":        true,
		        // "scrollCollapse": true,
		        // "paging":         false,
		    });
		    //////////Advance search/////////////
		    function filterColumn ( i )
		    {
		        $('#list_of_admin_datatable').DataTable().column( i ).search(
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
		public function update(daily_lead_id)
		{
			alert(daily_lead_id);
		}
	</script>
</body>
</html>