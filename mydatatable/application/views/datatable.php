<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
		<title>Data Table</title>
	</head>
	<body>
		<div class="container">
			<h1>Data Table</h1>
			<table id="mydatatable" class="table">
				<!-- <caption>Data Table</caption> -->
				<thead>
					<tr>
						<th>ID</th>
						<th>Full Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Password</th>
						<th>Created Date</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#mydatatable').DataTable(
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
			          "url": "http://localhost/mydatatable/datatable/get_data/",
			          "type": "POST"
			        },
		        });
			});
		</script>
	</body>
</html>