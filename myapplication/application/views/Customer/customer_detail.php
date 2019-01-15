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
              <!-- BEGIN PROFILE CONTENT -->
              <div class="profile-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="portlet light ">
                      <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                          <i class="icon-globe theme-font hide"></i>
                          <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                        </div>
                        <ul class="nav nav-tabs">
                          <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                          </li>
                          <li>
                            <a href="#tab_1_2" data-toggle="tab">Company Agrement</a>
                          </li>
                          <li>
                            <a href="#tab_1_3" data-toggle="tab">Authorize Persons</a>
                          </li>
                        </ul>
                      </div>
                      <div class="portlet-body">
                        <div class="tab-content">
                          <!-- PERSONAL INFO TAB -->
                          <div class="tab-pane active" id="tab_1_1">
                           <form class="form-horizontal">
                            <div class="form-body">
                             <div class="row">
                                <div class="col-md-6">
                                 <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Name</strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;" name="cust_name" id="cust_name" class="form-control" value="<?php echo $customer->cust_name; ?>" placeholder="Customer Name">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Contact No</strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;"name="cust_contact" id="cust_contact" class="form-control" value="<?php echo $customer->cust_contact; ?>" placeholder="Contact Number">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Id Card No</strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;"name="cust_idcard" id="cust_idcard" class="form-control" value="<?php echo $customer->cust_idcard; ?>" placeholder="Customer Id Card Number">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Business Name</strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;"name="cust_business_name" id="cust_business_name" class="form-control" value="<?php echo $customer->cust_business_name; ?>" placeholder="Business Name">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Business Licence NO</strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;" name="cust_business_licence" id="cust_business_licence" class="form-control" value="<?php echo $customer->cust_business_licence; ?>" placeholder="Business Licence NO">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong> Emirates </strong></label>
                                  <div class="dropdown col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;" name="emirates" id="emirates" value="<?php echo $customer->emirates; ?>" class="form-control" >
                                  </div>
                                </div>
                                <div class="form-group" style="border-bottom: 2px solid #eef1f5 ;  ">
                                <label class="col-md-3 col-form-label"><strong>Id Card </strong></label>
                                <div class="col-md-9">
                                  <a href="<?php echo base_url(); ?>/uploaded/<?php echo $customer->cust_idcard_copy; ?>" download="img">
                                    <img border="0" src="<?php echo base_url(); ?>/uploaded/<?php echo $customer->cust_idcard_copy; ?>" alt="img" width="200" height="200">
                                  </a>
                                 <span class="help-block"></span>
                                </div>
                              </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong> Nationality </strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;" name="cust_nationality" id="cust_nationality" class="form-control" value="<?php echo $customer->cust_nationality; ?>" placeholder="Customer Nationality" />
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Mobile No</strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;" name="cust_mobl" id="cust_mobl" class="form-control" value="<?php echo $customer->cust_mobl; ?>" placeholder="Customer Mobile No">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Address</strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;" name="cust_location" id="cust_location" class="form-control" value="<?php echo $customer->cust_location; ?>" placeholder="Address">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Email</strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;" name="cust_email"  id="cust_email" class="form-control" value="<?php echo $customer->cust_email; ?>" placeholder="Email">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>TRN No</strong></label>
                                  <div class="col-md-9">
                                    <input readonly type="text" style="background-color: rgba(0, 0, 0, 0);border:none;" name="trn_no"  id="trn_no" class="form-control" value="<?php echo $customer->trn_no; ?>" placeholder="Tr No">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                 <div class="form-group" style="border-bottom: 2px solid #eef1f5 ;  ">
                                <label class="col-md-3 col-form-label"><strong>Agrement</strong></label>
                                <div class="col-md-9">
                                  <a href="<?php echo base_url(); ?>/uploaded/<?php echo $customer->cust_agrement; ?>" download><?php echo $customer->cust_agrement; ?></a>
                                  <!-- <input type="file" name="cust_agrement" id="cust_agrement" class="form-control"> -->
                                  <span class="help-block"></span>
                                </div>
                              </div>
                              <div class="form-group" style="border-bottom: 2px solid #eef1f5 ;  ">
                                <label class="col-md-3 col-form-label"><strong>Passport</strong></label>
                                <div class="col-md-9">
                                  <a href="<?php echo base_url(); ?>/uploaded/<?php echo $customer->cust_passport; ?>" download><?php echo $customer->cust_passport; ?></a>
                                  <!-- <input type="file" name="cust_passport" id="cust_passport" class="form-control"> -->
                                  <span class="help-block"></span>
                                </div>
                              </div>
                              <div class="form-group" style="border-bottom: 2px solid #eef1f5 ;  ">
                                <label class="col-md-3 col-form-label"><strong>Licence </strong></label>
                                <div class="col-md-9">
                                  <a href="<?php echo base_url(); ?>/uploaded/<?php echo $customer->cust_licence; ?>" download><?php echo $customer->cust_licence; ?></a>
                                  <!-- <input type="file" name="cust_passport" id="cust_passport" class="form-control"> -->
                                  <span class="help-block"></span>
                                </div>
                              </div>
                              
                              </div>
                            </div>
                        </div>
                      </form>
                    </div>
                    <!-- END PERSONAL INFO TAB -->
                    <!-- CHANGE AVATAR TAB -->
                    <div class="tab-pane" id="tab_1_2">
                      <form action="#" id="form" class="form-horizontal"  enctype="multipart/form-data">
                        <div class="form-body">
                         <div class="row">
                          <div class="col-md-6">
                           <div class="form-group ">
                            <label class="col-md-3 col-form-label"><strong>Business Name</strong></label>
                            <div class="col-md-9">
                              <input type="text" name="business_name" id="business_name" class="form-control" placeholder="Business Name">
                              <span class="help-block"></span>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label class="col-md-3 col-form-label"><strong>Telephone No</strong></label>
                            <div class="col-md-9">
                              <input type="text" name="tele_no"  id="tele_no" class="form-control" placeholder="Telephone No">
                              <span class="help-block"></span>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label class="col-md-3 col-form-label"><strong>Mobile No</strong></label>
                            <div class="col-md-9">
                              <input type="text" name="mob_no" id="mob_no" class="form-control" placeholder="Mobile No">
                              <span class="help-block"></span>
                            </div>
                          </div>


                        </div>
                        <div class="col-md-6">
                         <div class="form-group ">
                          <label class="col-md-3 col-form-label"><strong>Licence No</strong></label>
                          <div class="col-md-9">
                            <input type="text" name="lice_no" id="lice_no" class="form-control" placeholder="Licence No">
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="form-group ">
                          <label class="col-md-3 col-form-label"><strong>ID Card No</strong></label>
                          <div class="col-md-9">
                            <input type="text" name="idcard_no" id="idcard_no" class="form-control" placeholder="ID Card No">
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="col-md-3 col-form-label"><strong>Terms and Condition</strong></label>
                          <div class="col-md-9">
                            <textarea class="form-control" name="terms_condition" id="terms_condition" rows="5" ></textarea>
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                    </div>   
                  </div>
                  <a class="btn btn-success col-md-offset-11" id="addNewRow" ><i class="glyphicon glyphicon-plus"></i></a>
                  <br />
                  <br />
                  <table id="dynamic_field" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!-- <th>Sr #</th> -->
                        <th style="width:200px;">Equipment Name</th>
                        <th>Rent Per Day</th>
                        <th>Rent Per Month</th>
                        <th style="width:200px;">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                    </tbody>
                  </table>
                </br>
                <button type="button" id="btnUpdate" onclick="update()" class="btn btn-primary col-md-offset-11">Update</button>
              </form>    
            </div>
            <!-- END Agrement TAB -->
            <!-- CHANGE PASSWORD TAB -->
            <div class="tab-pane" id="tab_1_3">
              <a class="btn btn-success col-md-offset-11" onclick="add_person()" id="addAuthorize" ><i class="glyphicon glyphicon-plus"></i></a>
            </br>
          </br>
          <table  id="personTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th >Person Name</th>
                <th>Profession</th>
                <th>Contact #</th>
                <th>Id Card</th>
                <th>Passport</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            </tbody>
          </table>
        </div>
        <!-- END CHANGE PASSWORD TAB -->

      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- END PROFILE CONTENT -->              

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
var id;
$(document).ready(function() {
  var i=0;  
  var ids=new Array();

  $('#addNewRow').click(function(){  

   i++;  
   $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text"  class="form-control" name="equipment[]" id="equipment_' + i + '"></td><td><input type="text"  class="form-control" name="rent_per_day[]" id="rent_per_day_' + i + '"></td><td><input type="text"  class="form-control" name="rent_per_month[]" id="rent_per_month_' + i + '" > </td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button></td></tr>');  


 });  
  $(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");  
   console.log(button_id);

   $('#row'+button_id+'').remove();  
 });

  var url = window.location.pathname;
  id = url.substring(url.lastIndexOf('/') + 1);  

  table = $('#personTable').DataTable({ 

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('Customer/get_persons')?>/"+id,
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

  reload_table();
  reload_person();

});

function reload_person()
{
    table.ajax.reload(null,false); //reload datatable ajax 
  }

  function reload_table(){
    $.ajax({
      url : "<?php echo site_url('Customer/get_agrement')?>/"+id,
        // type: "POST",
        // data: $('#form').serialize(),
        // data: new FormData($('form')[1]),
        dataType: "JSON",
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function(data)
        {
          console.log(data.equipments[0]);

          $('[name="business_name"]').val(data.detail.business_name);
          $('[name="tele_no"]').val(data.detail.tele_no);
          $('[name="mob_no"]').val(data.detail.mob_no);
          $('[name="lice_no"]').val(data.detail.lice_no);
          $('[name="idcard_no"]').val(data.detail.idcard_no);
          $('[name="terms_condition"]').val(data.detail.terms_condition);

          $('#dynamic_field').html('');
          $('#dynamic_field ').append(data.equipments);



        },
        error: function(xhr, status, error) 
        {
         console.log(xhr.responseText);

       }
     });
  }

  function update()
  {

    $('#btnupdate').text('saving...'); //change button text
    $('#btnupdate').attr('disabled',true); //set button disable 
    var url;


    url = "<?php echo site_url('Customer/equipment_update')?>/"+id;
    // ajax adding data to database
    $.ajax({
      url : url,
      type: "POST",
        // data: $('#form').serialize(),
        data: new FormData($('form')[1]),
        // dataType: "JSON",
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function(data)
        {
          console.log(data);

            if(data.status) //if success close modal and reload ajax table
            {
                // $('#modal_form').modal('hide');
                reload_table();
              }
              else
              {

              }
            $('#btnUpdate').text('update'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable 


          },
          error: function(xhr, status, error) 
          {
           // alert(xhr.responseText);
           console.log(xhr.responseText);
            $('#btnUpdate').text('update'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable 

          }
        });
}

function add_person()
{
  save_method = 'add';
    $('#personForm')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Customer'); // Set Title to Bootstrap modal title
  }

  function edit_person(id)
  {
    save_method = 'update';
    $('#personForm')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo site_url('Customer/person_edit/')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="ap_id"]').val(data.ap_id);
        $('[name="name"]').val(data.person_name);
        $('[name="profession"]').val(data.person_profession);

        $('[name="contact"]').val(data.contact_no);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Customer'); // Set title to Bootstrap modal title


          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
  }

  function save()
  {

    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
      url = "<?php echo site_url('Customer/person_add')?>/"+id;
    } else {
      url = "<?php echo site_url('Customer/person_update')?>/"+id;
    }
    // ajax adding data to database
    $.ajax({
      url : url,
      type: "POST",
        // data: $('#form').serialize(),
        data: new FormData($('form')[2]),
        // dataType: "JSON",
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function(data)
        {
          console.log(data);

            if(data.status) //if success close modal and reload ajax table
            {
              $('#modal_form').modal('hide');
              reload_person();
            }
            else
            {
                // for (var i = 0; i < data.inputerror.length; i++) 
                // {   

                //     $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //     $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                //     console.log(
                //     $('[name="'+data.inputerror[i]+'"]').next().text() //select span help-block class set text error string
                //         );
                // }
              }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


          },
          error: function(xhr, status, error) 
          {
           // alert(xhr.responseText);
           console.log(xhr.responseText);
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

          }
        });
}

function delete_person(id)
{
  if(confirm('Are you sure delete this data?'))
  {
        // ajax delete data to database
        $.ajax({
          url : "<?php echo site_url('Customer/person_delete')?>/"+id,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_person();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error deleting data');
              }
            });

      }
    }
    </script>

    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" role="dialog" >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Add Person</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="personForm" class="form-horizontal"  enctype="multipart/form-data">
              <input type="hidden" value="" name="ap_id" id="ap_id" /> 
              <div class="form-body">
               <div class="row">
                <div class="col-md-6">
                 <div class="form-group ">
                  <label class="col-md-3 col-form-label"><strong>Name</strong></label>
                  <div class="col-md-9">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Person Name">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group ">
                  <label class="col-md-3 col-form-label"><strong>Profession</strong></label>
                  <div class="col-md-9">
                    <input type="text" name="profession"  id="profession" class="form-control" placeholder="Profession">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group ">
                  <label class="col-md-3 col-form-label"><strong>Contact No</strong></label>
                  <div class="col-md-9">
                    <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact Number">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group ">
                  <label class="col-md-3 col-form-label"><strong>ID Card</strong></label>
                  <div class="col-md-9">
                    <input type="file" name="idcard" id="idcard" class="form-control">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group ">
                  <label class="col-md-3 col-form-label"><strong>Passport</strong></label>
                  <div class="col-md-9">
                    <input type="file" name="passport" id="passport" class="form-control">
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
        <button type="button" id="btnCancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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