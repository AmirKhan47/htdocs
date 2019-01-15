<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> File Completion Students </span>
        </li>
    </ul>
</div>
<h3 class="page-title"> File Completion Students </h3>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> File Completion Students </span>
        </div>
    </div>
    <div class="portlet-body form">
        <?php
                   if ($this->session->flashdata('err_message')) {
               ?>
                       <div class="alert alert-danger">
                           <button class="close" data-close="alert"></button>
                           <span><?php echo $this->session->flashdata('err_message'); ?></span>
                       </div>
               <?php
                   }

                   if ($this->session->flashdata('ok_message')) {
               ?>
                       <div class="alert alert-success">
                           <button class="close" data-close="alert"></button>
                           <span><?php echo $this->session->flashdata('ok_message'); ?></span>
                       </div>
               <?php
                   }
               ?>
        <?php
            if ($this->session->flashdata('err_message')) 
            {
        ?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('err_message'); ?></span>
                </div>
        <?php
            }

            if ($this->session->flashdata('ok_message')) 
            {
        ?>
                <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('ok_message'); ?></span>
                </div>
        <?php
            }
        ?>
    <div class="row">
        <div class="col-md-1 cwd form-group" ></div>
        <div class="col-md-2 cwd form-group" >
            <input type="text" class="form-control column_filter" data-column="0" name="reg_no"  id="id0" placeholder="Reg. No.">
        </div>
        <div class="col-md-2 cwd form-group">
            <input type="text" class="form-control column_filter" data-column="1" name="roll_no"  id="id1" placeholder="Roll No.">
        </div>
        <div class="col-md-2 cwd form-group">  
            <input type="text" class="form-control column_filter" data-column="2" name="name" id="id2" placeholder="Name">
        </div>
        <div class="col-md-2 cwd form-group">   
            <input type="text" class="form-control column_filter" data-column="3" name="cnic" id="id3" placeholder="Student CNIC">
        </div>
        <div class="col-md-2 cwd form-group"> 
            <input type="text" class="form-control column_filter" data-column="4" name="guardian_cnic" id="id4" placeholder="Guardian CNIC">
        </div>
    </div>
        <table class="table-sm table-striped table-bordered table-hover table-header-fixed dataTable no-footer" id="file_completion_students_datatable">
                <thead>
                    <tr>
                        <th> Reg. No. </th>
                        <th> Roll No. </th>
                        <th> Name </th>
                        <th> Student CNIC </th>
                        <th> Guardian CNIC </th>
                        <th> Contact </th>
                        <th> Branch </th>
                        <th> Status </th>
                        <th> Detail </th>
                        <th> File Completion </th>
                        <th> Send Email </th>
                    </tr>
                </thead>
        </table>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #32c5d2;">
                        <h5 class="modal-title" id="exampleModalLabel2"><strong>Admission Confirmation</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></h5>
                    </div>
                    <form id="sendMessage2">
                        <input type="hidden" name="student_id" value="">
                        <input type="hidden" name="student_email" value="">
                        <input type="hidden" name="student_name" value="">
                        <input type="hidden" name="student_class" value="">
                        <input type="hidden" name="branch_name" value="">
                        <input type="hidden" name="student_roll_no" value="">
                        <input type="hidden" name="pending_date" value="">
                        <input type="hidden" name="registration_date" value="">
                        <input type="hidden" name="branch_id" value="">
                        <div class="modal-body form-horizontal" style="padding-bottom: 0px">
                            <div class="form-inline">
                                <div class="form-group" style="margin-left: 5px;">
                                    <label>
                                        To
                                    </label>
                                    <b name="student_email"></b>
                                </div>
                            </div>
                            <p>Dear Guardian,<br>
                            Congratulations,
                            <b class="text-uppercase" name="student_name"></b> 
                            has been registered successfully in class
                            <b name="student_class"></b>
                            at branch <b name="branch_name"></b>
                            and his/her roll number is 
                            <b name="student_roll_no"></b>.<br><br>
                            Please find admission order attached.<br><br>
                            Registration Date: <b name="pending_date"></b>.<br>
                            Fee Challan Submission Date: <b name="registration_date"></b>.<br><br>
                            For file completion following requirements must be fullfilled.<br>
                            1. Undertaking By Guardian<input type="checkbox" name="" value="" checked><br>
                            2. Copy of Paid Fee Challan<input type="checkbox" name="" value="" checked><br>
                            3. Copy of Paid Registration Slip<input type="checkbox" name="" value=""><br>
                            4. Photographs<input type="checkbox" name="" value=""><br>
                            5. Copy of Form-B<input type="checkbox" name="" value=""><br>
                            6. Copy of Guardian Cnic<input type="checkbox" name="" value=""><br>
                            7. School Leaving Certificate<input type="checkbox" name="" value=""><br>
                            8. Record of Results<input type="checkbox" name="" value=""><br>
                            9. Merit Certificates<input type="checkbox" name="" value=""><br>
                            10. Gap Certificate<input type="checkbox" name="" value=""><br>
                            11. Character Certificate<input type="checkbox" name="" value=""><br>
                            12. Migration Certificate<input type="checkbox" name="" value=""><br>
                            13. Registration Card<input type="checkbox" name="" value=""><br>
                            14. Equivalence Certificate<input type="checkbox" name="" value=""><br>
                            15. Cancelation of Result<input type="checkbox" name="" value=""><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="location.href = '<?php echo SURL.'admin/registered_students/' ?>';" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" id="send_email_submit" class="btn btn-primary">
                                Submit
                            </button>
                            <br>
                            <div id="errors" class="" style="padding: 10px"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- <script src="<?php echo base_url(). 'assets/global/plugins/jquery.min.js'?>" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap/js/bootstrap.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/js.cookie.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery.blockui.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/uniform/jquery.uniform.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'?>" type="text/javascript"></script> -->
        <!-- END CORE PLUGINS -->
       <!--  <script src="<?php echo base_url(). 'assets/global/scripts/datatable.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/datatables/datatables.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'?>" type="text/javascript"></script> -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- <script src="<?php echo base_url(). 'assets/global/plugins/moment.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/morris/morris.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/morris/raphael-min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/counterup/jquery.waypoints.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/counterup/jquery.counterup.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/amcharts.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/serial.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/pie.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/radar.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/themes/light.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/themes/patterns.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/themes/chalk.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/ammap/ammap.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/ammap/maps/js/worldLow.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amstockcharts/amstock.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/fullcalendar/fullcalendar.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/flot/jquery.flot.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/flot/jquery.flot.resize.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/flot/jquery.flot.categories.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery.sparkline.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js'?>" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <!-- <script src="<?php echo base_url(). 'assets/global/scripts/app.min.js'?>" type="text/javascript"></script> -->
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- <script src="<?php echo base_url(). 'assets/pages/scripts/dashboard.min.js'?>" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/layout.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/jquery.dropselect.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/demo.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/layouts/global/scripts/quick-sidebar.min.js'?>" type="text/javascript"></script> -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- <script src="<?php echo base_url(). 'assets/pages/scripts/mydatatable1.js'?>" type="text/javascript"></script> -->
        <!-- <script src="<?php echo base_url(). 'assets/pages/scripts/registered_students.js'?>" type="text/javascript"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->
<!-- <script type="text/javascript">
    $("#sendMessage").on("submit", function(event)
    {
        event.preventDefault();
        sendMessage();
        // swal("Good job!", "You clicked the button!", "success");
        // return false;
    });
</script>
<script>
   /* $('#exampleModal').on('shown.bs.modal', function (e) {
      $this.find(input[name=student_id])
    });*/
    function addStudentDataToModal(student_id) 
    {
        var $form = $('#sendMessage');
        $form.find('input[name="student_id"]').val(student_id);
    }
</script>
<script>
    $('#sendMessage').validate(
    {
        rules: 
        {
            message: 
            {
              MESSAGE: "required MESSAGE",
              minlength: 10,
                required: true
            }
        }, 
        highlight: function(element) 
        {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) 
        {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) 
        {
            if(element.parent('.input-group').length) 
            {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) 
        {
          sendMessage();
        }
    });
    function sendMessage()
    {
          // Get some values from elements on the page:
        var $form = $('#sendMessage'),
        url = BASE_URL+"sendMessage";
        $form.find('button[type="submit"]').prop("disabled", true);
        // Send the data using post
        var posting = $.post( url, $form.serialize());
        // Put the results in a div
        posting.done(function( data) 
        {
            alert(data);
          if(data==="success")
          {
            //window.location.replace(BASE_URL+"admin/dashboard");
          }
          else
          {
            $( "#errors" ).html( data );  
          }
          
        })
        .fail(function() 
        {
            alert( "error" );
        })
        .always(function() 
        {
            $form.find('button[type="submit"]').prop("disabled", false);
        });
    }
</script> -->