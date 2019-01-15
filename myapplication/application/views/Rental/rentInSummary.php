<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layouts/common'); ?>
    <style> 
    .help-block{color:#F00;}
    .error{color:#F00;}
    .Error{color:#F00;}
    </style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('layouts/header'); ?>
    <div class="page-container">
        <?php $this->load->view('layouts/side_bar_menu'); ?>
        <div class="page-content-wrapper">
            <div class="page-content">
                <?php $this->load->view('layouts/breadcrumb'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase">Manage RentIn </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                       <!--  <a data-toggle="modal" href="#addProductModel" class="btn green-haze btn-lg item_edit" >Add Product</a>
                                    </a> -->
                                       
                                </div>
                            </div>
                        </div>              

                        <div class="portlet-body">
                        <button class="btn btn-success" onclick="view_rentin()">Completed </button>
                            
                        <form id="form" class="form-horizontal" action="<?php echo base_url(); ?>Rental/EditRentInInvoice" method="post">
                            <input type="submit" id="editRentin" class="btn btn-info col-md-offset-11" value="Go" />
                            <input type="hidden" id="invoices" name="invoices">
                            <input type="hidden" id="product_ids" name="product_ids">
                            <input type="hidden" id="product_unique_ids" name="product_unique_ids">
                           
                        <br />
                            <br />
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Out Date</th>
                                        <th>Invoice #</th>
                                        <th>Customer Name</th>
                                        <th>Business Name</th>
                                        <th>Contact #</th>
                                        <th>Site Name</th>
                                        <th>Equipment Description</th>
                                        <th>Balance Qty</th>
                                        <th>Total Qty</th>
                                        <th style="width:200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?>
<script type="text/javascript">
var save_method; //for save method string
var table;

$(document).ready(function() {
    
    //datatables
    table = $('#table').DataTable({ 

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Rental/rentin_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
$("form").submit(function(e){
    var invoices = [];  
    var proids = [];  
    var uniqids = [];  
        $(".emp_checkbox:checked").each(function() {  
            invoices.push($(this).data('invoice-id'));
            proids.push($(this).data('product-id'));
            uniqids.push($(this).data('product_unique-id'));
        }); 
        if(invoices.length <=0)  {  
            alert('Please Select Invoices');
            // e.preventDefault(e);
            return false;
        }  
        else {  

            $('#editRentin').text('saving...'); //change button text
            $('#editRentin').attr('disabled',true); //set button disable 
            var selected_values = invoices.join(","); 
            var selected_values2 = proids.join(","); 
            var selected_values3 = uniqids.join(","); 
            $('#invoices').val(selected_values);
            $('#product_ids').val(selected_values2);
            $('#product_unique_ids').val(selected_values3);
            // e.preventDefault(e);
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('Rental/setUserData')?>/"+invoices[0],
                // data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data){
                // console.log(data);
                // $(this).submit();
                return true;

                },
                error: function(xhr, status, error) 
                {
                   console.log(xhr.responseText);
                }

                });
            
        }
 
});
// jQuery('#editRentin').on('click', function(e) { 
//         var employee = [];  
//         $(".emp_checkbox:checked").each(function() {  
//             employee.push($(this).data('emp-id'));
//         }); 
//         if(employee.length <=0)  {  
//             alert('ghh');
//         }  
//         else {  
//             // var selected_values = employee.join(","); 
//         }  
//     });
   
});

function view_rentin(id)
{
            window.location = "<?php echo site_url('Rental/RentInCompleted')?>/"+id;
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
// function edit_rentin(id)
// {
//             // window.location = "<?php echo site_url('Rental/EditRentInInvoice')?>/"+id;
// }
function delete_rentin(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Rental/rentin_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function(xhr, status, error) 
            {
               // alert(xhr.responseText);
               console.log(xhr.responseText);
            }
        });

    }
}

</script>

<?php 
if($this->session->flashdata('success')){
    $message=$this->session->flashdata('success');
    echo "<script>    toastr.success('".$message."') </script>";
}else if($this->session->flashdata('error')){
    $message=$this->session->flashdata('error');
    echo "<script>    toastr.error('".$message."') </script>";
}
?>
</body>
</html>