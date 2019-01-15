<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Book Display</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> -->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Book List</h1>
                    <table id="book-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Book Title</th>
                                <th>Book Price</th>
                                <th>Book Author</th>
                                <th>Rating</th>
                                <th>Publisher</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() 
            {
                $('#book-table').DataTable(
                // "processing": true,
                // "serverSide": true,
                // "pageLength" : 5,
                {
                    "ajax": 
                    {
                        url : "<?php echo base_url();?>/books/books_page",
                        type : 'GET'
                    },
                });
            });
        </script>
    </body>
</html>