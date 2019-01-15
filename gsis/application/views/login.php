<!doctype html>
<html lang="en">
  <head>
    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url();?>";
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/login.css?1" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo Assets;?>32x32.png" /> 
  </head>

  <body class="text-center bg-info">
    <form id="signinform" class="form-signin bg-light animated tada">
      <h1 class="h3 mb-3 font-weight-light text-secondary">Please sign in to <b>GSIS</b></h1>
      <!-- <label>Email address</label> -->
      <input type="text" class="form-control mb-2" placeholder="Username" name="username" required>

      <!-- <label>Password</label> -->
      <input type="password" class="form-control" placeholder="Password" name="password" required>
<!-- <div name="gcaptcha" class="g-recaptcha" data-callback="recaptchaCallback"  data-sitekey="6LfTe1IUAAAAANprIefnCZJwBYdZGzvVpnujdxCY"></div> -->
      
      <button id="signinform_submit_button" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <?php echo validation_errors(); ?>
      <div id="errors"></div>
    </form>
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- jquery js and jquery validate js -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script>
            // function recaptchaCallback() 
            // {
            //     $('#signinform_submit_button').removeAttr('disabled');//disabled
            // };
            $.validator.addMethod("USERNAME",function(value, element) {
                        return this.optional(element) || /^[a-zA-Z]+[a-zA-Z0-9]+$/.test(value) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/.test(value);
                    }, "Not Username not an Email: Please enter a valid username/Email.");

            $('#signinform').validate({
                rules: {
                    username: {
                      USERNAME: "required USERNAME",
                      minlength: 2,
                        required: true
                    },
                    password: {
                        maxlength: 100,
                        required: true
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if(element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                  dologin();
                }
            });
            function dologin()
            {
                // Get some values from elements on the page:
                $('#signinform_submit_button').prop("disabled", true);
                var $form = $('#signinform'),
                url = BASE_URL+"login/studentlogin";
                // Send the data using post
                var posting = $.post( url, $form.serialize());
                // Put the results in a div
                posting.done(function(data)
                {
                    if(data==='Success Admin')
                    {
                        window.location.href="<?php echo SURL.'school/admin_dashboard'?>";
                    }
                    if(data==='Success User')
                    {
                        window.location.href="<?php echo SURL.'user/dashboard'?>";
                    }
                    else
                    {
                        $( "#errors" ).html( data );  
                    } 
                })
                .fail(function() 
                {
                    alert( "Please Refresh the page and try again" );
                })
                .always(function() 
                {
                    $('#signinform_submit_button').prop("disabled", false);
                });
            }
    </script>
    </body>
</html>
