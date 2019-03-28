// Applying For

$(document).ready(function()

{

    // $('#applying_for_btn').click(function(event)

    // {

        $("#applying_for_form").submit(function(event)

        {

            event.preventDefault();

            var url= window.location.origin+"/recruitment/applying_for_update/";

            // var url= "http://www.redstartechs.org/gsis/staging/recruitment/get_applicants/";

            var data=$("#applying_for_form").serializeArray();

            $.ajax(

            {

                url: url,

                type: 'POST',

                data: data,

            })

            .done(function() 

            {

                $('#applying_for_update_alert').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Success! </strong>Data has been Updated.</div>');

                console.log("success");

                $("#applying_for_update_alert").fadeTo(2000, 500).slideUp(500, function()

                {

                    $("#applying_for_update_alert").slideUp(500);

                });

            })

            .fail(function() 

            {

                $('#applying_for_update_alert').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error! </strong>Data has not been Updated.</div>');

                console.log("error");

                $("#applying_for_update_alert").fadeTo(2000, 500).slideUp(500, function()

                {

                    $("#applying_for_update_alert").slideUp(500);

                });

            })

            .always(function() 

            {

                console.log("complete");

            });

            return false;

        });

    // });

});

// Personal Details

$(document).ready(function()

{

    $('#personal_details_btn').click(function(event)

    {

        event.preventDefault();

        var url= window.location.origin+"/recruitment/personal_details_update/";

        // var url= "http://www.redstartechs.org/gsis/staging/recruitment/personal_details_update/";

        var data=$("#personal_details_form").serializeArray();

        $.ajax(

        {

            url: url,

            type: 'POST',

            data: data,

        })

        .done(function()

        {

            $('#personal_detail_alert').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Success! </strong>Data has been Updated.</div>');

            console.log("success");

            $("#personal_detail_alert").fadeTo(2000, 500).slideUp(500, function()

            {

                $("#personal_detail_alert").slideUp(500);

            });

        })

        .fail(function() 

        {

            $('#personal_detail_alert').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error! </strong>Data has not been Updated.</div>');

            console.log("error");

            $("#personal_detail_alert").fadeTo(2000, 500).slideUp(500, function()

            {

                $("#personal_detail_alert").slideUp(500);

            });

        })

        .always(function() 

        {

            console.log("complete");

        });

    });

});

// Detail of Children

$(document).ready(function()

{

    $('#children_details_btn').click(function(event)

    {

        event.preventDefault();

        var url= window.location.origin+"/recruitment/children_details_add/";

        // var url= "http://www.redstartechs.org/gsis/staging/recruitment/children_details_add/";

        var data=$("#personal_details_form").serializeArray();

        $.ajax(

        {

            url: url,

            type: 'POST',

            data: data,

        })

        .done(function(data) 

        {

            $('#personal_details_alert').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Success! </strong>Data has been Updated.</div>');

            console.log("success");

            $("#personal_details_alert").fadeTo(2000, 500).slideUp(500, function()

            {

                $("#personal_details_alert").slideUp(500);

            });

            $('#tbo').html(data);

            // setTimeout(function()

            // {// wait for 5 secs(2)

            //     location.reload(); // then reload the page.(3)

            // }, 3000)

        })

        .fail(function() 

        {

            $('#personal_details_alert').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error! </strong>Data has not been Updated.</div>');

            console.log("error");

            $("#personal_details_alert").fadeTo(2000, 500).slideUp(500, function()

            {

                $("#personal_details_alert").slideUp(500);

            });

        })

        .always(function() 

        {

            console.log("complete");

        });

    });

});

// Delete Children

function delete_child(id,event)

{

    event.preventDefault();

    // var child_id= $('#id_'+id).val();

    var employee_id= $('#employee_id').val();

    var url= window.location.origin+"/recruitment/children_details_delete/";

    // var url="http://www.redstartechs.org/gsis/staging/recruitment/children_details_delete/";

    if(confirm("Are you sure you want to delete this?"))

    {

        $.ajax(

        {

            url: url,

            type: 'POST',

            data: 

            {

                children_detail_id: id,

                employee_id: employee_id

            },

        })

        .done(function(data) 

        {



            $('#personal_details_alert').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Success! </strong>Data has been Deleted.</div>');

            console.log("success");

            $("#personal_details_alert").fadeTo(2000, 500).slideUp(500, function()

            {

                $("#personal_details_alert").slideUp(500);

            });

            $('#tbo').html(data);

            // setTimeout(function()

            // {// wait for 5 secs(2)

            //     location.reload(); // then reload the page.(3)

            // }, 3000)

        })

        .fail(function() 

        {

            $('#personal_details_alert').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error! </strong>Data has not been Deleted.</div>');

            console.log("error");

            $("#personal_details_alert").fadeTo(2000, 500).slideUp(500, function()

            {

                $("#personal_details_alert").slideUp(500);

            });

        })

        .always(function() 

        {

            console.log("complete");

        });  

    }

}

// Show Data in Edit Form

function showupdate(id)

{

    $('.show_'+id).prop('type', 'text');

    $('.hide_'+id).hide();

    $('.update_'+id).show();

}

// Update Data On Button Click

function submitupdate(id,event)

{

    event.preventDefault();

    // $('.show_'+id).prop('type', 'hidden');

    // $('.hide_'+id).show();

    // $('.update_'+id).hide();

    var serialized=$('#child_'+id).serializeArray();

    var url= window.location.origin+"/recruitment/children_details_update/"+id;

    // var url="http://www.redstartechs.org/gsis/staging/recruitment/children_details_update/"+id;

    $.ajax(

    {

        url: url,

        type: 'POST',

        data: {

            child_name: $('#h_name_'+id).val(),

            class_name: $('#h_class_'+id).val(),

            school_name:$('#h_school_'+id).val(),

            employee_id:$('#employee_id').val()

        },

    })

    .done(function(data)

    {

        if(data==1)

        {

            $('#div_name_'+id).html($('#h_name_'+id).val());

            $('#div_class_'+id).html($('#h_class_'+id).val());

            $('#div_school_'+id).html($('#h_school_'+id).val());

        }

        $('.show_'+id).prop('type', 'hidden');

        $('.hide_'+id).show();

        $('.update_'+id).hide();

        $('#personal_details_alert').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Success! </strong>Data has been Updated.</div>');

        console.log("success");

        $("#personal_details_alert").fadeTo(2000, 500).slideUp(500, function()

        {

            $("#personal_details_alert").slideUp(500);

        });

    })

    .fail(function()

    {

        console.log("error");

    })

    .always(function()

    {

        console.log("complete");

    });

}

// Test/Demo Result Update

$(document).ready(function()

{

    $('#test_demo_result_update_btn').click(function(event)

    {

        event.preventDefault();

        var url= window.location.origin+"/recruitment/test_demo_result_update/";

        // var url= "http://www.redstartechs.org/gsis/staging/recruitment/test_demo_result_update/";

        var data=$("#test_demo_result_form").serializeArray();

        $.ajax(

        {

            url: url,

            type: 'POST',

            data: data,

        })

        .done(function()

        {

            $('#test_demo_result_alert').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Success! </strong>Data has been Updated.</div>');

            console.log("success");

            $("#test_demo_result_alert").fadeTo(2000, 500).slideUp(500, function()

            {

                $("#test_demo_result_alert").slideUp(500);

            });

        })

        .fail(function() 

        {

            $('#test_demo_result_alert').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error! </strong>Data has not been Updated.</div>');

            console.log("error");

            $("#test_demo_result_alert").fadeTo(2000, 500).slideUp(500, function()

            {

                $("#test_demo_result_alert").slideUp(500);

            });

        })

        .always(function() 

        {

            console.log("complete");

        });

    });

});

//On Class Select Get Branches

$(document).ready(function()

{

   $('#class_id').change(function()

    {

        var class_id = $(this).val();

        if(class_id == '')

        {

            $('#branch_id').prop('disabled', true);

        }

        else

        {

            var myurl = 'http://localhost/gsis/student/getBranchesInClass/'+class_id;

            // var myurl = 'http://www.redstartechs.org/gsis/staging/student/getBranchesInClass/'+class_id;

            // alert(myurl);

            $('#branch_id').prop('disabled', false);

            $('#branch_id').removeAttr('title')

            $.ajax(

            {

                url: myurl,

                type: "GET",

                success: function(data)

                {

                    mdata=JSON.parse(data);

                    if(mdata.response=='success')

                    {

                        $('#branch_id').html(mdata['data']);     

                    }

                    else

                    {

                         $('#branch_id').html(''); 

                    }

                   

                },

                error: function(a,b,c,d)

                {

                    alert('Error occur...!!');

                }

            });

        }

    }); 

});