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
                                    <span class="caption-subject bold uppercase">Manage Rentout </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                       <!--  <a data-toggle="modal" href="#addProductModel" class="btn green-haze btn-lg item_edit" >Add Product</a>
                                    </a> -->
                                       
                                </div>
                            </div>
                        </div>              

                        <div class="portlet-body">
                    <form id="form" class="form-horizontal" action="<?php echo base_url(); ?>Rental/<?php if(isset($detail)){ echo 'updateRentout';}else{ echo 'addRentout';} ?>/<?php echo $this->uri->segment(3);?>" method="post">
                    <input type="hidden" value="" name="sup_id" id="sup_id" /> 
                    <div class="form-group">
                         <div class="row">
                            <div class="col-md-3">
                
                                    <label class="control-label"><strong>Rent-Out Date</strong></label>
                                     <input name="out_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="<?php if(isset($detail)){ echo $detail->out_date; } ?>">
                                     <span class="help-block"></span>
                            
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><strong>Rent-Out Time</strong></label>
                                <div class="input-icon">
                                    <i class="fa fa-clock-o"></i>
                                    <input type="text" class="form-control timepicker-default timepicker-default-default" value="<?php if(isset($detail)){ echo $detail->out_time; }else{} ?>" name="out_time" id="out_time"> </div>
                            </div>
                            <div class="col-md-3">
                                
                                    <label class="control-label"><strong>Slip No</strong></label>
                                     <input name="slip no" readonly placeholder="Slip No" class="form-control" value="<?php if(isset($detail) && $detail->virtual_invoice!=""){ echo $detail->virtual_invoice; }else{ echo $tr_no->virtual_invoice; } ?>" type="text">
                                     <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><strong>Tr No</strong></label>
                                     <input name="tr_no" id="tr_no" placeholder="Tr No" class="form-control" value="<?php if( isset($detail) ) { echo $detail->tr_no; } ?>" type="text">
                                     <span class="help-block"></span>  
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="form-group">
                         <div class="row">
                            <div class="col-md-3">
                
                                <label class="control-label"><strong>Customer Type</strong></label>
                                <select class="form-control" id="cust_type" required name="cust_type"> 
                                    <option></option>
                                    <option value="registered" <?php if(isset($detail) && $detail->cust_type=='registered'){ echo 'selected';} ?> >Registered</option>
                                    <option value="cash" <?php if(isset($detail) && $detail->cust_type=='cash'){ echo 'selected';} ?> >Cash</option>
                                </select>
                                <span class="help-block"></span>
                            
                            </div>
                                <div class="col-md-3">
                                    <input name="test_cust_id" id="test_cust_id" type="hidden" value="<?php if(isset($detail) && $detail->cust_id != 0){ echo $detail->cust_id; } ?>">
                                    <input type="hidden" id="checkCustomer" name="checkCustomer" value="<?php if(isset($detail) && $detail->cust_id != 0){ echo 1; } ?>"/>
                                    <label class="control-label"><strong>Customer Name</strong></label>
                                    <input type="text" class="form-control" list="name-options" id="cust_name" name="cust_name" value="<?php if(isset($detail)){ echo $detail->temp_name; } ?>" />
                                    <datalist id="name-options" >
                                    <?php foreach ($customers as $customer) {
                                       echo '<option value="'.$customer->cust_name.'" data-id="'.$customer->cust_id.'" "><input name="cust_id" type="hidden" value="'.$customer->cust_id.'">'.$customer->cust_name.'</option>';
                                    } ?>    
                                    </datalist>
                                </br>
                                <span class="help-block"></span>
                            </div>

                            <!-- <div class="col-md-3">
                                <label class="control-label"><strong>Cash Customer</strong></label>
                                <?php if(isset($detail) && $detail->cust_type=='cash'){ ?>
                                <input type="text" name="temp_name" id="temp_name" class="form-control" value="<?php echo $detail->temp_name ;?>"> 
                                <?php }else{ ?>
                                <input type="text" name="temp_name" id="temp_name" class="form-control" readonly value=""> 
                                <?php }    ?>
                                <span class="help-block"></span>
                            </div> -->    
                            <div class="col-md-3">
                                
                                    <label class="control-label"><strong>Contact No</strong></label>
                                     <input name="contact_number" id="contact_number" list="mob-options" placeholder="" class="form-control" type="text" value="<?php if(isset($detail)){ echo $detail->contact_no; } ?>">
                                      <datalist id="mob-options" >
                                    <?php foreach ($customers as $customer) {
                                       echo '<option value="'.$customer->cust_mobl.'" data-id="'.$customer->cust_id.'" "><input name="cust_id" type="hidden" value="'.$customer->cust_id.'">'.$customer->cust_mobl.'</option>';
                                    } ?>    
                                    </datalist>
                                     <span class="help-block"></span>
                            </div>
                            
                             <div class="col-md-3">
                                    <label class="control-label"><strong>Authorized Person</strong></label>
                                      <select class="form-control" id="autorized_person"  name="autorized_person"> 
                                    <?php if(isset($detail) && $detail->person_id!=0){ echo '<option value="'.$detail->person_id.'">'.$detail->person_name.'</option>';} ?>
                                    </select>  
                                    </br>
                                    <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                         <div class="row">
                            <div class="col-md-3">
                                
                                    <label class="control-label"><strong>Business Name</strong></label>
                                     <input name="B_N" id="B_N" list="bn-options" placeholder="" class="form-control" type="text" value="<?php if(isset($detail)){ echo $detail->B_N; } ?>">
                                      <datalist id="bn-options" >
                                    <?php foreach ($customers as $customer) {
                                       echo '<option value="'.$customer->cust_business_name.'" data-id="'.$customer->cust_id.'" "><input name="cust_id" type="hidden" value="'.$customer->cust_id.'">'.$customer->cust_business_name.'</option>';
                                    } ?>    
                                    </datalist>
                                     <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                                
                                    <label class="control-label"><strong>ID Card No</strong></label>
                                     <input name="id_card" id="id_card" placeholder="" class="form-control" type="text" value="<?php if(isset($detail)){ echo $detail->id_card; } ?>">
                                     <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Sales Man</strong></label>
                                    <select class="form-control" id="salesman" required name="salesman"> 
                                        <option></option>  
                                        <?php if(!empty($salesman)) { ?>
                                        <?php foreach ($salesman as $name) { ?>
                                        <option value="<?php echo $name['user_id']; ?>" <?php if(isset($detail)){ echo 'selected';}?> ><?php echo $name['user_name']; ?></option>   
                                        <?php } }?>
                                    </select>  
                                    <span class="help-block"></span>
                            
                            </div>
                           
                            <!-- <div class="col-md-3">
                                <label><strong>Rental Unit</strong></label>
                                    <select class="form-control" id="rental_unit" required name="rental_unit"> 
                                    <option></option>
                                    <option value="daily" <?php if(isset($detail) && $detail->rental_unit=='daily'){ echo 'selected';} ?>>Daily</option>
                                    <option value="monthly" <?php if(isset($detail) && $detail->rental_unit=='monthly'){ echo 'selected';} ?>>Monthly</option>
                                    </select>  
                                    <span class="help-block"></span>
                            </div> -->
                            <div class="col-md-3">
                                    <label class="control-label"><strong>Advance Money</strong></label>
                                      <input type="advance" name="advance" class="form-control" value="<?php if(isset($detail)){ echo $detail->advance; } ?>"> 
                                    </br>
                                    <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                         <div class="row">
                             <div class="col-md-6">
                                
                                    <label class="control-label"><strong>Address</strong></label>
                                     <textarea class="form-control" name="address" id="address"  id="address" rows="5" placeholder="Address" > <?php if(isset($detail)){ echo $detail->address; } ?> </textarea>
                                     <span class="help-block"></span>
                            </div>
                            <div class="col-md-6">
                                
                                    <label class="control-label"><strong>Note</strong></label>
                                     <textarea class="form-control" name="note"  id="note" rows="5" placeholder="note" ><?php if(isset($detail)){ echo $detail->note; } ?></textarea>
                                     <span class="help-block"></span>
                            </div>
                        
                            
                        </div>
                        
                    </div>

                        <div class="row">
                            <div class="col-md-12">
                               <!--  <?php if(isset($detail)){ ?>
                                <input type="button"  name="add" id="add" class="btn green" value="Add More"> 
                                <?php }else{ ?> -->
                                <input type="button"  name="add" id="add" class="btn green" value="Add More"> 
                                <!-- <?php } ?> -->

                                <table class="table table table-striped table-bordered" id="dynamic_field">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Unique Id </th>
                                            <th>Rental Unit </th>
                                            <th>Site Name </th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($detail)){ ?>
                                    <?php $products= $this->Store_model->get_rental_products(); ?>
                                    <?php $list= $this->Rental_model->get_invoiceProducts($this->uri->segment(3)); ?>
                                    <!-- <?php print_r($list); ?>  -->
                                    <?php $i=00; $y=0; foreach ($list as $agrement) { ?>

                                    <tr id="row<?php echo $i; ?>">
                                        <td><select class="form-control input-medium" name="productname[]" id="productname_<?php echo $i; ?>">
                                            <?php foreach ($products as $items) { ?>
                                                <option value="<?php echo $items['prd_id']; ?>" <?php if($agrement['prd_id']==$items['prd_id']){ echo 'selected';} ?>> <?php echo $items['prd_name'];?> </option>
                                            <?php } ?>
                                            </select>
                                        </td>
                                      <?php $uniqueids= $this->Store_model->get_product_uniqueids($agrement['prd_id']); ?>
                                        <!-- <?php print_r($uniqueids);  ?>   -->
                                        <td><select class="form-control input-medium" name="productunique[]" id="productunique_<?php echo $i; ?>">
                                             <option value=""><option>
                                             <?php foreach ($uniqueids as $items) { ?>
                                                <option value="<?php echo $items['pu_id']; ?>" <?php if(trim($agrement['uniqueid'])==trim($items['prd_unique_id'])){ echo 'selected';} ?> > <?php echo $items['prd_unique_id'];?> </option>
                                            <?php } ?>
                                            </select>
                                        </td>
                                        <td><input type="text" readonly class="form-control" value="<?php if(isset($list)){ echo $agrement['rental_unit']; } ?>" name="rental_unit[]" id="rental_unit_<?php echo $i; ?>" > </td>
                                        <!-- <td><input type="text" class="form-control" value="<?php if(isset($list)){ echo $agrement['prd_color']; } ?>" readonly name="color[]" id="color_<?php echo $i; ?>"></td> -->
                                        <!-- <td><input type="text" class="form-control" value="<?php if(isset($list)){ echo $agrement['prd_color']; } ?>" readonly name="color[]" id="color_<?php echo $i; ?>"></td> -->
                                        <td><input type="text" class="form-control" value="<?php if(isset($list)){ echo $agrement['site_name']; } ?>" name="site_name[]" id="site_name_<?php echo $i; ?>" > </td>
                                        <td><input type="text" required <?php if($agrement['prd_unique_id']!=null){echo 'readonly';} ?> class="form-control" value="<?php if(isset($list)){ echo $agrement['prd_qty']; } ?>" data-original-id="<?php echo $agrement['prd_qty']; ?>" name="qty[]" id="qty_<?php echo $i; ?>" > </td>
                                        <!-- <input type="hidden" id="qty"> -->
                                        <td><input type="text" required class="form-control" value="<?php if(isset($list)){ echo $agrement['prd_price']; } ?>" readonly name="price[]" id="price_<?php echo $i; ?>" > </td>
                                        <td><button type="button" name="remove" id="<?php echo $i; ?>" class="btn btn-danger btn_remove">X</button></td>
                                    </tr> 
                                    <?php $i++; } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-8 col-md-2">
                                <a href="<?php echo site_url('Rental/rentOut')?>"><button type="button" class="btn default">Cancel</button></a>
                                <button type="submit" class="btn blue">Submit</button>
                            </div>
                        </div>
                    </div>
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
var selectData=new Array();
var proudctQty=0;
// function getAutho(){
//     console.log($('#name-options').val());
// }
$(document).ready(function() {
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
            // console.log(data);
            
                // Get select
            // var select = document.getElementById('product_0');
            // Add options
            for (var i in data) {
                if(data[i]['prd_qty']!=0)
                selectData[i]='<option value=' + data[i]['prd_id']+'>' + data[i]['prd_name'] + '</option>';
              // console.log(selectData[i]);
            }
        }
    });

  var i=0; 
  var prData=''; 
  $('#add').click(function(){  
   // i++;  
  $("#dynamic_field tbody tr").each(function() {    
    i++;
   });

   $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control input-medium" name="productname[]" id="productname_' + i + '"><option></option></select></td><td><select class="form-control input-medium" name="productunique[]" id="productunique_' + i + '"><option></option></select></td><td><select class="form-control input-small" name="rental_unit[]" id="rental_unit_' + i + '"><option></option><option value="daily">Daily</option><option value="monthly">Monthly</option></select></td><td><input type="text" class="form-control " name="site_name[]" id="site_name_' + i + '" data-original-id="" > </td><td><input type="text" required class="form-control " name="qty[]" id="qty_' + i + '" data-original-id="" > </td><td><input type="text" required class="form-control" readonly name="price[]" id="price_' + i + '" > </td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   $('#productname_'+i).append(selectData);
   $('[name^=productname]').select2();
   

});  
  $(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
});

    $('#dynamic_field').on("change",'[name^=productname]',function(){ 
        // console.log($(this).attr('id'));
        var res = $(this).attr('id').split("_");
        //console.log(res[1]);
        var id = $(this).find(":selected").val();
        var tdData,check=0;
        // var prd_qty=0;
        //General Details...............
        $.ajax({

            url:"<?php echo base_url() ?>Store/getProductDetail/"+id,
            type: "POST",
            dataType:"json",

            success:function(data){

                if(data.idExisit!='0'){
                
                    proudctQty=1;
                    $('#qty_'+res[1]).val(1);
                }else{
               
                    proudctQty=parseInt(data.prd_qty);
                    $('#qty_'+res[1]).val(data.prd_qty);
                }
                
                // $('#color_'+res[1]).val(data.prd_color);  
                  
                // prd_qty=data.prd_qty;  
                console.log(proudctQty);
                // if($('#rental_unit').val()=='daily'){
                // $('#price_'+res[1]).val(data.prd_rent_per_day);  

                // }else{
                // $('#price_'+res[1]).val(data.prd_rent_per_month);  

                // }
            }

        });
        console.log(id);
        //Geeting unique ids.............
        $.ajax({

            url:"<?php echo base_url() ?>Store/product_uniqueids/"+id,
            type: "POST",
            dataType:"json",

            success:function(data){
                $('#productunique_'+res[1]).html('');
                    $('#productunique_'+res[1]).append('<option selected value=""></option>');
                    console.log(data);
                if(data.length!=0){
                    for (var i = 0; i < data.length; i++) { 
                       
                       $("#dynamic_field tbody tr").not(':last').each(function() {
                        tdData=($(this).children().eq(1).find('option:selected').text());
                        if(tdData==data[i]['prd_unique_id']){
                          check=1;
                        }
                        }); 

                      if(data[i]['status']!=0 && check!=1)               
                      $('#productunique_'+res[1]).append('<option value="'+data[i]['pu_id']+'">'+data[i]['prd_unique_id']+'</option>');
                      check=0;
                  };

                $('#productunique_'+res[1]).attr('readonly',false);  
                $('#qty_'+res[1]).attr('readonly',true);  

              }else{
                $('#qty_'+res[1]).attr('readonly',false);  
                $('#productunique_'+res[1]).attr('readonly',true);  
            }

        }

        });
    });
// $("input[name=cust_name]").focusout(function(){
//     alert($(this).val());
// });
$('#cust_name').change(function() { 
 
 var id=$('#name-options option').filter(function() {
        return $('#cust_name').val() == this.value;
}).data("id");   
     // console.log(id);

    if(typeof id != "undefined"){   
     
    $('#checkCustomer').val('1');
    $('#test_cust_id').val(id);
    $.ajax({
        url : "<?php echo site_url('Customer/customerPersons/')?>/"+ id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('#autorized_person').html('');
            $('#autorized_person').append('<option></option>');
            for (var i = 0; i < data.length; i++) {                
                  $('#autorized_person').append('<option value="'+data[i]['ap_id']+'">'+data[i]['person_name']+'</option>');
             }; 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

$.ajax({
    url : "<?php echo site_url('Customer/customerDetail/')?>/"+ id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        console.log(data);
        $('#address').val(data.cust_location); 
        $('#contact_number').val(data.cust_contact); 
        $('#id_card').val(data.cust_idcard); 
        $('#tr_no').val(data.trn_no); 
        $('#B_N').val(data.cust_business_name);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
});

}else{
    $('#checkCustomer').val('0');

}

});
$('#contact_number').change(function() { 
 
 var id=$('#mob-options option').filter(function() {
        return $('#contact_number').val() == this.value;
}).data("id");   
            console.log(id);

    if(typeof id != "undefined"){   
     
    $('#checkCustomer').val('1');
    $('#test_cust_id').val(id);

    $.ajax({
        url : "<?php echo site_url('Customer/customerPersons/')?>/"+ id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('#autorized_person').html('');
            $('#autorized_person').append('<option></option>');
            for (var i = 0; i < data.length; i++) {                
                  $('#autorized_person').append('<option value="'+data[i]['ap_id']+'">'+data[i]['person_name']+'</option>');
             }; 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

$.ajax({
    url : "<?php echo site_url('Customer/customerDetail/')?>/"+ id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        console.log(data);
        $('#address').val(data.cust_location); 
        $('#cust_name').val(data.cust_name); 
        $('#tr_no').val(data.trn_no); 
        $('#id_card').val(data.cust_idcard); 
        $('#B_N').val(data.cust_business_name);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
});

}else{
    $('#checkCustomer').val('0');

}

});

$('#B_N').change(function() { 
 
 var id=$('#bn-options option').filter(function() {
        return $('#B_N').val() == this.value;
}).data("id");   
            console.log(id);

    if(typeof id != "undefined"){   
     
    $('#checkCustomer').val('1');
    $('#test_cust_id').val(id);

    $.ajax({
        url : "<?php echo site_url('Customer/customerPersons/')?>/"+ id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('#autorized_person').html('');
            $('#autorized_person').append('<option></option>');
            for (var i = 0; i < data.length; i++) {                
                  $('#autorized_person').append('<option value="'+data[i]['ap_id']+'">'+data[i]['person_name']+'</option>');
             }; 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

$.ajax({
    url : "<?php echo site_url('Customer/customerDetail/')?>/"+ id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        console.log(data);
        $('#address').val(data.cust_location); 
        $('#cust_name').val(data.cust_name); 
        $('#tr_no').val(data.trn_no); 
        $('#id_card').val(data.cust_idcard); 
        $('#contact_number').val(data.cust_mobl);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
});

}else{
    $('#checkCustomer').val('0');

}

});

$('#cust_type').change(function() { 
    $('#contact_number').val('');
    $('#autorized_person').html('');
    $('#address').val('');
    $('#cust_name').val('');
    $('#id_card').val('');
    $('#tr_no').val(''); 
    $('#B_N').val('');

});

// $('#rental_unit').change(function() { 
//     if($(this).val()!=''){
//         $('#add').attr('disabled',false);
//     }else{
//         $('#add').attr('disabled',true);
//     }

//     $('#dynamic_field tbody').empty();

// }); 


$('#dynamic_field').on("change",'[name^=rental_unit]',function(){ 

        var res = $(this).attr('id').split("_");
        console.log(res[2]);
        var id = $(this).find(":selected").val();

         $.ajax({
            url:"<?php echo base_url() ?>Store/getProductDetail/"+$('#productname_'+res[2]).val(),
            type: "POST",
            dataType:"json",

            success:function(data){

                if(id=='daily'){
                $('#price_'+res[2]).val(data.prd_rent_per_day);  

                }else{
                $('#price_'+res[2]).val(data.prd_rent_per_month);  

                }
            }

        });
            
});

$('#dynamic_field').on("change",'[name^=qty]',function(){ 

if($(this).data('original-id')!=''){        
      if($(this).val()>$(this).data('original-id')){
       $(this).val($(this).data('original-id'));
    }  
}else{
   if($(this).val()>proudctQty){
       $(this).val(proudctQty);
    } 
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
                min:1,
                number:true,
            }
            // 'productunique[]': { 
            //     required:true,
            // }
            
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
            // 'productunique[]': { 
            //     required: "Please Select Unique Id",
            // }
            
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