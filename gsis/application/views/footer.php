
        <div class="page-footer">
            <!-- <div class="page-footer-inner"> Oppein - CRM
                
            </div> -->
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->

        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo Assets;?>global/plugins/respond.min.js" type="text/javascript" ></script>
        <script src="<?php echo Assets;?>global/plugins/excanvas.min.js" type="text/javascript" ></script>

        <script src="<?php echo Assets;?>global/plugins/jquery.min.js" type="text/javascript" ></script>
        <script src="<?php echo Assets;?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>global/plugins/js.cookie.min.js" type="text/javascript" ></script>
        <script src="<?php echo Assets;?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript" ></script>
        <script src="<?php echo Assets;?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript" ></script>

        <script src="<?php echo Assets;?>global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo Assets;?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <script src="<?php echo Assets;?>global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript" ></script>

        <script src="<?php echo Assets;?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>

        <script src="<?php echo Assets;?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo Assets;?>global/scripts/datatable.js" type="text/javascript"></script>

        <script src="<?php echo Assets;?>global/scripts/app.min.js" type="text/javascript" ></script>

        <script src="<?php echo Assets;?>pages/scripts/components-date-time-pickers.min.js" type="text/javascript" ></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo Assets;?>global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <script src="<?php echo Assets;?>pages/scripts/form-wizard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo Assets;?>layouts/layout/scripts/layout.min.js" type="text/javascript" ></script>
        <script src="<?php echo Assets;?>layouts/layout/scripts/demo.min.js" type="text/javascript" ></script>
        <script src="<?php echo Assets;?>layouts/global/scripts/quick-sidebar.min.js" type="text/javascript" ></script>
        <script src="<?php echo Assets;?>layouts/global/scripts/quick-nav.min.js" type="text/javascript" ></script>

        <script src="<?php echo Assets;?>myscript/bdm-datable.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>myscript/ro-datable.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>pages/scripts/mydatatable.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>pages/scripts/mydatatable1.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>pages/scripts/registered_students.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>applicants.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>myscript/newlead-datatable.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>myscript/ro-select2.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>myscript/alllead-datatable.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>myscript/activity-select2-datatable.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>myscript/allotment-datatable.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>js/jquery.maskedinput.min.js" type="text/javascript"></script>  
        <script src="<?php echo Assets;?>pages/scripts/validation.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>custom.js" type="text/javascript"></script>
        <script src="<?php echo Assets;?>applicant_detail.js" type="text/javascript"></script>
        <?php if ($active=="registered_student_details") { ?>
            <script src="<?php echo Assets;?>student_details.js" type="text/javascript"></script>
        <?php } ?>
        <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->        
        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> -->

        <!-- END THEME LAYOUT SCRIPTS-->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
        <!-- <script type="text/javascript">
            $('#date').datepicker({ dateFormat: 'dd-mm-yy' });
        </script>  --> 
        <script type="text/javascript">
            $("input[name='branch_phone']").mask('051-9999999').bind("blur", function () 
            {
                // force revalidate on blur.
                var frm = $(this).parents("form");
                // if form has a validator
                if ($.data( frm[0], 'validator' ))
                {
                    var validator = $(this).parents("form").validate();
                    validator.settings.onfocusout.apply(validator, [this]);
                }
            });
        </script>
        <script type="text/javascript">
            $("#sendMessage").on("submit", function(event)
            {
                event.preventDefault();
                sendMessage();
            });
        </script>
        <script>
            function addStudentDataToModal(student_id,student_name,student_email,student_class)
            {
                var $form = $('#sendMessage');
                $form.find('input[name="student_id"]').val(student_id);
                $form.find('b[name="student_email"]').html(student_email);
                $form.find('b[name="student_name"]').html(student_name);
                $form.find('b[name="student_class"]').html(student_class);
                // $form.find('b[name="contact_email"]').html(contact1_email);
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
                    }
                    else 
                    {
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
                url = BASE_URL+"admin/sendMessage";
                $form.find('button[type="submit"]').prop("disabled", true);
                // Send the data using post
                var posting = $.post( url, $form.serialize());
                // Put the results in a div
                posting.done(function( data)
                {
                    if(data==="email sent")
                    {
                        $form.trigger('reset');
                        var myhtml='<div class="alert alert-success alert-dismissible"><b>Success!</b>Email Sent Successfully</div>';
                        $( "#errors" ).html(myhtml);
                        // $("test_result_btn").disabled = true;
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
        </script>
        <script type="text/javascript">
            $("#sendMessage2").on("submit", function(event)
            {
                event.preventDefault();
                sendMessage2();
            });
        </script>
        <script>
            function addStudentDataToModal2(student_id,student_name,student_email,student_class,branch_name,student_roll_no,pending_date,registration_date,branch_id)
            {
                var $form = $('#sendMessage2');
                $form.find('input[name="student_id"]').val(student_id);
                $form.find('input[name="student_email"]').val(student_email);
                $form.find('input[name="student_name"]').val(student_name);
                $form.find('input[name="student_class"]').val(student_class);
                $form.find('input[name="branch_name"]').val(branch_name);
                $form.find('input[name="student_roll_no"]').val(student_roll_no);
                $form.find('input[name="pending_date"]').val(pending_date);
                $form.find('input[name="registration_date"]').val(registration_date);
                $form.find('input[name="branch_id"]').val(branch_id);

                $form.find('b[name="student_email"]').html(student_email);
                $form.find('b[name="student_name"]').html(student_name);
                $form.find('b[name="student_class"]').html(student_class);
                $form.find('b[name="branch_name"]').html(branch_name);
                $form.find('b[name="student_roll_no"]').html(student_roll_no);
                $form.find('b[name="pending_date"]').html(pending_date);
                $form.find('b[name="registration_date"]').html(registration_date);
            }
        </script>
        <script>
            $('#sendMessage2').validate(
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
                    }
                    else 
                    {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form)
                {
                  sendMessage2();
                }
            });
            function sendMessage2()
            {
              // Get some values from elements on the page:
                var $form = $('#sendMessage2'),
                url = BASE_URL+"admin/sendMessage2";
                $form.find('button[type="submit"]').prop("disabled", true);
                // Send the data using post
                var posting = $.post( url, $form.serialize());
                // Put the results in a div
                posting.done(function( data)
                {
                    if(data==="email sent")
                    {
                        $form.trigger('reset');
                        var myhtml='<div class="alert alert-success alert-dismissible"><b>Success!</b>Email Sent Successfully</div>';
                        $( "#errors" ).html(myhtml);
                        // $("test_result_btn").disabled = true;
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
        </script>
        <script>
            function getStudentMessages(student_id)
            {
                // Get some values from elements on the page:
                url = "getStudentMeetings/"+student_id;
                //$form.find('button[type="submit"]').prop("disabled", true);
                // Send the data using post
                var getting = $.get(url);
                // Put the results in a div
                getting.done(function( data)
                {
                    mdata=JSON.parse(data);
                    if(mdata.response==="success")
                    {
                        //alert(mdata.meetings);
                        var html="";
                        $.each(mdata.meetings , function(index, val)
                        { 
                          html= val.meeting_from_date+' '+val.meeting_from_time;
                          alert(html);
                        });
                        //var myhtml='<div class="alert alert-success alert-dismissible"><b>Success!</b>Email Sent Successfully</div>';
                        //$( "#errors" ).html(myhtml);
                        //window.location.replace(BASE_URL+"admin/dashboard");
                    }
                    else
                    {
                        alert('no messages');
                        //$( "#errors" ).html( data );  
                    }
                })
                .fail(function()
                {
                    alert( "error" );
                })
                .always(function()
                {
                    // $form.find('button[type="submit"]').prop("disabled", false);
                });
            }
        </script>
        <script>
            function getStudentMessages2(student_id)
            {
                // Get some values from elements on the page:
                url = "getStudentMeetings/"+student_id;
                //$form.find('button[type="submit"]').prop("disabled", true);
                // Send the data using post
                var getting = $.get(url);
                // Put the results in a div
                getting.done(function( data)
                {
                    mdata=JSON.parse(data);
                    if(mdata.response==="success")
                    {
                        //alert(mdata.meetings);
                        var html="";
                        $.each(mdata.meetings , function(index, val)
                        { 
                          html= val.meeting_from_date+' '+val.meeting_from_time;
                          alert(html);
                        });
                        //var myhtml='<div class="alert alert-success alert-dismissible"><b>Success!</b>Email Sent Successfully</div>';
                        //$( "#errors" ).html(myhtml);
                        //window.location.replace(BASE_URL+"admin/dashboard");
                    }
                    else
                    {
                        alert('no messages');
                        //$( "#errors" ).html( data );  
                    }
                })
                .fail(function()
                {
                    alert( "error" );
                })
                .always(function()
                {
                    // $form.find('button[type="submit"]').prop("disabled", false);
                });
            }
        </script>
        <!-- <script>
            $.validate(
            {
                modules : 'location, date, security, file',  
            });
        </script> -->
    </body>
</html>        