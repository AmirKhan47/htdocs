alert('hello');
$(function()
{
    $('#nine').hide(); 
    $('#eleven').hide();
    $('#o_levels').hide();
    $('#a_levels').hide();
    $('#select_class').change(function()
    {
        if($('#select_class').val() == '1')
        {
            $('#nine').show();
        }  
        else
        {
            $('#nine').hide(); 
        } 
    });
    $('#select_class').change(function()
    {
        if($('#select_class').val() == '3')
        {
            $('#eleven').show();
        }  
        else
        {
            $('#eleven').hide(); 
        } 
    });
    /*
        $('#select_class').change(function()
        {
        if($('#select_class').val() == '5') 
        {
            $('#o_levels').show();
        }  
        else
        {
            $('#o_levels').hide(); 
        } 
    });
        $('#select_class').change(function()
        {
        if($('#select_class').val() == '6') 
        {
            $('#a_levels').show();
        }  
        else
        {
            $('#a_levels').hide(); 
        } 
    });*/
    $("#form_sample_16").submit(function()
    {
        alert('done');
        if ($('.subject').filter(':checked').length < 5)
        {
            $('#error').text('error');
            return false;
        }
    });
    $("#2addguardian").click(function () 
    {
        $("#container").append('<div class="col-md-9"> <table class="table table-bordered"><tr><td>Relationship to child</td><td>CNIC</td><td>Occupation</td><td>Designation</td><td>Organization</td></tr><tr><td><input type="text" ></td><td><input type="text" onblur="checkGuardianNationalId(this)" placeholder="11111-1111111-1"></td><td><input type="text" ></td><td><input type="text" ></td><td><input type="text" ></td></tr></table></div>');
    });
});    
$(document).ready(function() 
{
    $("input[name='student_national_id']").mask('99999-9999999-9');
    $("input[name='guardian_national_id']").mask('99999-9999999-9').bind("blur", function () 
    {
        var frm = $(this).parents("form");
        if ($.data( frm[0], 'validator' )) 
        {
          var validator = $(this).parents("form").validate();
          validator.settings.onfocusout.apply(validator, [this]);
        }
    });
    $("input[name='contact_cell']").mask('0399-9999999');
    getSubjects();
});     
$.validator.addMethod("FULLNAME",function(value, element) 
{
    return this.optional(element) || /^[a-zA-Z]+([ :-]?[a-zA-Z]+)*[ ]*$/.test(value);
}, 'Please enter a valid name e.g "Osama Iqbal khan" or "Quaid-e-Azam" without quotes');
$.validator.addMethod("contact_email",function(value, element) 
{
            return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
        
}, "Email Address is invalid: Please enter a valid email address.");
$.validator.addMethod("registration_reason_for_leaving",function(value, element) 
{
            return this.optional(element) || /^[a-zA-Z]+([a-zA-Z. ]+)*$/.test(value);
}, "Please enter a valid reason");
function registerSubjects() 
{
    alert($('#select_class').val());
}
/*$('#form_sample_16').submit(function(e) 
{
    e.preventDefault();
    //$('#select_subject')
    var subjects =[];
    $('#select_subject input:checkbox').each(function () 
    {
        if(this.checked)
            subjects.push($(this).val());
    });
    alert(subjects[0]);
    //alert($('#select_class').val());
});*/
$('#select_branch').change(function()
{
    var branch = $('#select_branch').val();
    $('#select_branch').prop("disabled", true);
    var url = BASE_URL+"admin/getClassesInBranch/"+branch;

    // Send the data using post
    var getting = $.get( url);
    // Put the results in a div
    getting.done(function( data) 
    {
        //alert(data);
        mdata=JSON.parse(data);
        if(mdata.response==="success")
        {
            var html="";
            $.each( mdata.classes, function( index, value )
            {
                html+='<option value="'+value.id+'">'+value.class_name+'</option>';
                $('#select_class').html(html);
                //alert(value.class_name);
            }); 
        }
        else 
        if(mdata.response==="fail")
        {
            alert("no data");
        }
      
    })
    .fail(function() 
    {
      alert( "error" );
    })
    .always(function() 
    {
        // alert( "finished" );
        $('#select_branch').prop("disabled", false);
    });
});
$('#select_class').change(function()
{
    getSubjects();
});
function getSubjects() 
{
    var classes = $('#select_class').val();
    $('#select_class').prop("disabled", true);
    var url = BASE_URL+"admin/getSubjectInClasses/"+classes;
    // Send the data using post
    var getting = $.get( url);
    // Put the results in a div
    getting.done(function( data) 
    {
        //alert(data);
        mdata=JSON.parse(data);
        var html="";
        var previousValue="";
        if(mdata.response==="success")
        {
            $.each( mdata.subjects, function( index, value )
            {
                if(value.subject_group!=previousValue)
                {
                    previousValue=value.subject_group;
                    html+='<div class="col-md-12">';
                    if(value.subject_group != null)
                    {
                        html+='<b> Group '+value.subject_group+'</b>';
                    }else{
                        html+='<b> No group </b>';
                    }
                    html+='</div>';
                }
                //bootstrap col-12
                html+='<div class="col-md-3">';
                html+='<div class="md-checkbox"><input type="checkbox" name="checkboxes1[]" value="'+value.id+'" id="checkbox1_'+value.id+'" class="md-check">';
                html+='<label for="checkbox1_'+value.id+'"><span></span><span class="check"></span><span class="box"></span> '+value.subject_name+' </label>';
                if(value.subject_type != null)
                {
                    html+='<ul style="font-size: 10px;">';
                    html+='<li>'+value.subject_type+'</li>';
                    html+='</ul>'
                }
                html+='</div>';
                //bootstrap col-12
                html+='</div>';
                $('#select_subject').html(html);
                //alert(value.class_name);
            }); 
        }
        else 
        if(mdata.response==="fail")
        {
            html+='no subjects';
            $('#select_subject').html(html);
        }
    })
    .fail(function() 
    {
        alert( "error" );
    })
    .always(function() 
    {
        //alert( "finished" );
        //$('#select_class').prop("disabled", false);
    });
}
$('#form_sample_16').submit(function(e) 
{
    e.preventDefault();
    var subjects =[];
    $('#select_subject input:checkbox').each(function () 
    {
        if(this.checked)
            subjects.push($(this).val());
    });

    $('#select_branch').prop("disabled", true);
    var url = BASE_URL+"admin/insertStudentSubjects/",
    student_id = $('#student_id').val();
    // Send the data using post
    var posting = $.post( url,{subjects:subjects,student_id:student_id});
    // Put the results in a div
    posting.done(function( data) 
    {
        mdata=JSON.parse(data);
        if(mdata.response==="success")
        {
            window.location.replace(BASE_URL+"admin/registered_student_detail/"+student_id);
            var html="";
            $.each( mdata.classes, function( index, value )
            {
                html+='<option value="'+value.id+'">'+value.class_name+'</option>';
                $('#select_class').html(html);
                // alert(value.class_name);
            }); 
        }
        else
        if(mdata.response==="fail")
        {
            alert("no data");
        } 
    })
    .fail(function() 
    {
        alert( "error" );
    })
    .always(function() 
    {
        alert( "finished" );
        $('#select_branch').prop("disabled", false);
    });
});      
function checkGuardianNationalId(elem)
{
    var element=$(elem);
    var cnic = element.val();
    //var $form = $('#signupform'),
    if(1==1)
    {
    //if(element.valid()){
        //set to loading
        element.prop("disabled", true);
        //changefeedback(element,loadingFeedback,'');
        var url = BASE_URL+"admin/isGuardianNationalIdRegistered/"+cnic;
        // Send the data using post
        var checkcnic = $.get( url)
        .done(function( data ) 
        {
            // alert(data);
            mdata=JSON.parse(data);
            if(mdata.response==="success")
            {
                $("#addGuardianForm").find('input[name="student_guardian_relationship"]').val();
                $("#addGuardianForm").find('input[name="guardian_national_id"]').val();
                $("#addGuardianForm").find('input[name="guardian_occupation"]').val(mdata.guardian[0].guardian_occupation);
                $("#addGuardianForm").find('input[name="guardian_designation"]').val(mdata.guardian[0].guardian_designation);
                $("#addGuardianForm").find('input[name="guardian_organization"]').val(mdata.guardian[0].guardian_organization);
                $("#addGuardianForm").find('input[name="guardian_name"]').val(mdata.guardian[0].guardian_name);
                //set to success
                //element.prop("disabled", false);
                //changefeedback(element,successFeedback,'has-success');
            }
            else 
            if(mdata.response==="cnic not available")
            {
                //var validator = $( "#signupform" ).validate();
                //$("#signupform_cnic_error_message").show();
                //element.prop("disabled", false);
                //changefeedback(element,errorFeedback,'has-error');
                /*$("#cnic").validate().showErrors({
                  "cnic": "Username already registered!"
                });*/
            }
            else
            {
                //clearInput(element);
                //alert(data);
            }
        })
        .fail(function() 
        {
            // alert( "error" );
        })
        .always(function() 
        {
            element.prop("disabled", false);
        //alert( "finished" );
        });
    }
}
// Add Guardian   
$("#addGuardianForm").submit(function (e) 
{
    e.preventDefault();
    var form=$('#addGuardianForm');
    var element=$('#addGuardian');
    /*var data = {
        "student_id":$('#student_id').val(),
        "student_guardian_relationship":element.closest('tr').find('input[name="student_guardian_relationship"]').val(),
        "guardian_national_id":element.closest('tr').find('input[name="guardian_national_id"]').val(),
        "guardian_occupation":element.closest('tr').find('input[name="guardian_occupation"]').val(),
        "guardian_designation":element.closest('tr').find('input[name="guardian_designation"]').val(),
        "guardian_organization":element.closest('tr').find('input[name="guardian_organization"]').val(),
        "guardian_name":element.closest('tr').find('input[name="guardian_name"]').val()
      };*/
    element.prop("disabled", true);
    //changefeedback(element,loadingFeedback,'');
    var url = BASE_URL+"admin/addGuardian";
    // Send the data using post
    var posting = $.post( url,form.serialize() + '&student_id=' + $('#student_id').val())
    .done(function( data ) 
    {
       mdata=JSON.parse(data);
        if(mdata.response==="success")
        {
            //set to success
            var html='<div class="alert alert-success">success</div>';
            $('#divtodisplay').html(html);
            //element.prop("disabled", false);
            //changefeedback(element,successFeedback,'has-success');
        }
        else 
        if(mdata.response==="already guardian")
        {
            var html='<div class="alert alert-warning">already guardian</div>';
            $('#divtodisplay').html(html);
        }
        else
        if(mdata.response==="cnic not available")
        {
            //var validator = $( "#signupform" ).validate();
            //$("#signupform_cnic_error_message").show();
            //element.prop("disabled", false);
            //changefeedback(element,errorFeedback,'has-error');
            /*$("#cnic").validate().showErrors({
              "cnic": "Username already registered!"
            });*/
            var html='<div class="alert alert-danger">cnic not available</div>';
            $('#divtodisplay').html(html);
        }
        else
        {
            //clearInput(element);
            // alert(data);
            var html='<div class="alert alert-danger">!</div>';
            $('#divtodisplay').html(html);
        }
    })
    .fail(function() 
    {
        // alert( "error" );
        var html='<div class="alert alert-danger">error!</div>';
            $('#divtodisplay').html(html);
    })
    .always(function() 
    {
        element.prop("disabled", false);
    //alert( "finished" );
    });
});    