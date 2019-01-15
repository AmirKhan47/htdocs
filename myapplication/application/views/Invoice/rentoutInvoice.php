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
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">


                       <div class="portlet-body">
                        <!-- BEGIN CONTENT -->
                        <!-- END PAGE HEADER-->
                        <div class="invoice">
                            <div class="row invoice-logo">
                                <div class="col-xs-6 col-xs-offset-4">
                                    <h1 class="page-title"> Invoice
                                        <small>Rent-Out</small>
                                    </h1>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-xs-6">
                                    <address>
                                    <strong>AL Lamaie building euipment rental</strong><br>
                                        Ph 055-6249919    |  050-1968244<br>
                                        airport road al kharan Ras-Ll-khaimah,UAE<br>
                                        Mail: allamaierental@gmail.com  web www.lamaieeqrental.com<br>
                                        <strong>TRN NO -123456789100004</strong>
                                    </address>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <address>
                                    <strong>اللامي لتأجير معدات البناء:</strong><br>
                                        Ph 055-6249919    |  050-1968244<br>
                                        طريق المطار الخران راس الخيمة ، الإمارات العربية المتحدة<br>
                                        Mail: allamaierental@gmail.com  web www.lamaieeqrental.com<br>
                                        <strong>TRN NO -123456789100004</strong>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h3>Customer Detail:</h3>
                                    <ul class="list-unstyled">
                                 
                                        <li> <strong>Name</strong>&emsp;&emsp;&nbsp; <?php echo $detail->temp_name;?></li>
                                        <!-- <li> <strong>Name</strong>&emsp;&emsp;&nbsp; <?php echo $detail->cust_name.$detail->temp_name;?></li> -->
                                        <li> <strong>Address</strong>&emsp;&nbsp; <?php echo $detail->address;?></li>
                                        <li> <strong>Contact #</strong>&emsp;<?php echo $detail->contact_no;?></li>
                                        <li> <strong>TRN No</strong>&emsp;&emsp;<?php echo $detail->tr_no;?></li>
                                        <li> <strong>ID No</strong>&emsp;&emsp;&emsp;<?php echo $detail->id_card;?></li>
                                        
                                    </ul>
                                </div>
                                <div class="col-xs-6">
                                    <h3>Additional Info:</h3>
                                    <ul class="list-unstyled">
                                        <li> <strong>Tr Date</strong>&emsp;&nbsp;&nbsp;&nbsp; &emsp;<?php echo date("Y-m-d h:i");?></li>
                                        <li> <strong>Invoice #</strong>&emsp; &emsp;<?php echo $detail->virtual_invoice;?></li>
                                        <li> <strong>Salesman</strong>&emsp;&emsp;<?php echo $detail->name;?></li>
                                        <li> <strong>Customer In Charge</strong><?php echo $detail->person_name;?></li>
                                        <li> <strong>Advance Money</strong>&emsp;&emsp;<?php echo $detail->advance;?></li>
                                        <!-- <li> <strong>Payment-</strong>&emsp;&emsp;<?php echo $detail->payment_type;?></li>
                                        <li> <strong>&nbsp;mode</strong></li> -->
                                    </ul>
                                </div>
                                <!-- <div class="col-xs-4 invoice-payment">
                                    <h3>Payment Details:</h3>
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong>V.A.T Reg #:</strong> 542554(DEMO)78 </li>
                                        <li>
                                            <strong>Account Name:</strong> FoodMaster Ltd </li>
                                        <li>
                                            <strong>SWIFT code:</strong> 45454DEMO545DEMO </li>
                                        <li>
                                            <strong>Account Name:</strong> FoodMaster Ltd </li>
                                        <li>
                                            <strong>SWIFT code:</strong> 45454DEMO545DEMO </li>
                                    </ul>
                                </div> -->
                            </div>
                        </br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Equipment</th>
                                                <th>Site Name</th>
                                                <th>Rental Unit</th>
                                                <th>Qty</th>
                                                <th>Price Per unit</th>
                                                <!-- <th class="hidden-xs">Price Per unit</th> -->
                                                <!-- <th> Total </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($products as $items) { ?>
                                            <tr>
                                                <td><?php echo $i; ?> </td>
                                                <td ><?php echo $items['prd_name'].'   : '.$items['prd_unique_id']; ?></td>
                                                <td><?php echo $items['site_name']; ?></td>
                                                <td><?php echo $items['rental_unit']; ?></td>
                                                <td><?php echo $items['prd_qty']; ?></td>
                                                <td><?php echo $items['prd_price']; ?></td>
                                                <!-- <td class="hidden-xs"><?php echo $items['prd_price']; ?></td> -->
                                                <!-- <td class="hidden-xs"><?php echo $detail->out_date; ?></td> -->
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </br>
                        </br>
                            <div class="row">
                                <div class="col-xs-4 col-xs-offset-8 invoice-block">
                                   <!--  <ul class="list-unstyled amounts">
                                        <li>
                                            <strong>Sub - Total amount:</strong> $9265 </li>
                                        <li>
                                            <strong>Discount:</strong> 12.9% </li>
                                        <li>
                                            <strong>VAT:</strong> ----- </li>
                                        <li>
                                            <strong>Grand Total:</strong> $12489 </li>
                                    </ul> -->
                                    <br/>
                                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                                        <i class="fa fa-print"></i>
                                    </a>
                                    <a class="btn btn-lg green hidden-print margin-bottom-5"> Send Mail
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                <!-- END CONTENT -->
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
var selectData=new Array();
var proudctQty=0;

$(document).ready(function() {
    
    // $('#cust_name').editableSelect();
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        todayBtn: true,
        todayHighlight: true,
        setDate: new Date()

    });
    $(".datepicker").datepicker("setDate", new Date());

//Geeting products.............
    $.ajax({

        url:"<?php echo base_url() ?>/Store/getProducts",
        type: "POST",
        // data: {id:supplier_id},
        dataType:"json",

        success:function(data){
            console.log(data);
                // Get select
            // var select = document.getElementById('product_0');
            // Add options
            for (var i in data) {
                selectData[i]='<option value=' + data[i]['prd_id']+'>' + data[i]['prd_name'] + '</option>';
            }
        }
    });

  var i=0;  
  $('#add').click(function(){  
   i++;  

   $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control input-medium" name="productname[' + i + ']' + '" id="productname_' + i + '"><option></option></select></td><td><input type="text" required class="form-control" readonly name="color[' + i + ']' + '" id="color_' + i + '"></td><td><input type="text" required class="form-control " name="qty[' + i + ']' + '" id="qty_' + i + '" > </td><td><input type="text" required class="form-control" readonly name="price[' + i + ']' + '" id="price_' + i + '" > </td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   $('#productname_'+i).append(selectData);


});  
  $(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
});

    $('#dynamic_field').on("change",'[name^=productname]',function(){ 
        console.log($(this).attr('id'));
        var res = $(this).attr('id').split("_");
        //console.log(res[1]);
        var id = $(this).find(":selected").val();

        $.ajax({

            url:"<?php echo base_url() ?>Store/getProductDetail/"+id,
            type: "POST",
            dataType:"json",

            success:function(data){
                console.log(data);
                proudctQty=parseInt(data.prd_qty);
                $('#color_'+res[1]).val(data.prd_color);  
                $('#qty_'+res[1]).val(data.prd_qty);  
                if($('#rental_unit').val()=='daily'){
                $('#price_'+res[1]).val(data.prd_rent_per_day);  

                }else{
                $('#price_'+res[1]).val(data.prd_rent_per_month);  

                }
            }

        });
    });

$('#cust_type').change(function() { 
    if($(this).val()=='permanent'){
             //Ajax Load unique ids ajax
    $.ajax({
        url : "<?php echo site_url('Customer/getCustomers/')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#temp_name').val('');
            $('#temp_name').attr('readonly',true);
            $('#cust_name').html('');
            $('#cust_name').append('<option></option>');
            for (var i = 0; i < data.length; i++) {                
                  $('#cust_name').append('<option value="'+data[i]['cust_id']+'">'+data[i]['cust_name']+'</option>');
             }; 

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    }else{
            $('#cust_name').html('');
            $('#person_name').html('');
            $('#temp_name').attr('readonly',false);
    }

    });



$('#cust_name').change(function() { 
        console.log('here');
    $.ajax({
        url : "<?php echo site_url('Customer/customerPersons/')?>/"+ $(this).val(),
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('#person_name').html('');
            $('#person_name').append('<option></option>');
            for (var i = 0; i < data.length; i++) {                
                  $('#person_name').append('<option value="'+data[i]['ap_id']+'">'+data[i]['person_name']+'</option>');
             }; 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    });
$('#rental_unit').change(function() { 
    if($(this).val()!=''){
        $('#add').attr('disabled',false);
    }else{
        $('#add').attr('disabled',true);
    }

    $('#dynamic_field tbody').empty();

}); 

    $('#dynamic_field').on("change",'[name^=qty]',function(){ 

    if($(this).val()>proudctQty){
        $(this).val(proudctQty);

    }

});

});

    $("#form").validate({
        rules: {
            out_date: { 
                required:true,
            },
            'productname[]': { 
                required:true,
            },
            'price[]': { 
                required:true,
                number:true,
            },
            'qty[]': { 
                required:true,
                number:true,
            }
            
        },
        messages: {
            out_date: { 
                required: "Please Select Date",
               
            },
            'productname[]': { 
                required: "Please Select Product",
            },
            'price[]': { 
                required: "Please Enter Amount",
                number: "Please Enter Valid Data",
            },
            'qty[]': { 
                required: "Please Enter Quantity",
                number: "Please Enter Valid Data",
            }
            
        }
    });
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Supplier</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal"  enctype="multipart/form-data">
                    <input type="hidden" value="" name="sup_id" id="sup_id" /> 
                    <div class="form-body">
                         <div class="row">
                                <div class="col-md-6">
                                 <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Name</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="sup_name" id="sup_name" class="form-control" placeholder="Supplier Name">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Email</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="email"  id="email" class="form-control" placeholder="Supplier Email">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Licence No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="sup_licence"  id="sup_licence" class="form-control" placeholder="Licence No">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Mobile No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Phone No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Contact Number">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Address</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" id="btnCancel" onclick="cancel()" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
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