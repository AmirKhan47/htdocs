
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sign in page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="<?php echo SURL. 'assets/css/sign_in.css'?>" rel="stylesheet">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  </head>

  <body class="text-center" style="background: url('<?php echo SURL.'assets/logo/medical-background-with-loop_n26ve-_yg__F0005.png';?>')no-repeat center;">
    <form class="form-signin" method="post" id="login" action="<?php echo SURL.'Login/validate_user'?>">
      <!-- <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h5 class="mb-3 font-weight-light text-light">Please sign in</h5>
      <br/>
      <label style="font-color:white;" type="message" name="message" id="message"></label>
      <label for="email" class="cols-sm-2 control-label text-light float-left">Your Email</label>
      <label for="inputEmail" class="sr-only mb-5">Email address</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="someone@mail.com" required autofocus>
      <label for="email" class="cols-sm-2 control-label text-light float-left">Password</label>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="123456789" required>
      <!-- <div class="checkbox mb-3">
       <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in" name="submit" id="submit">
     <p>Not a user? <a style="color: white" href="<?php echo SURL.'Login/register';?>">Sign Up</a></p>
    </form>

    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#submit').click(function(e){
              
           var email = $('#email').val();
           var password = $('#password').val();
          if(email != '' &&  password != '')
          {
              e.preventDefault();
             $.ajax({

              url:"<?php echo SURL.'Login/validate_user' ?>",

              method:"POST",
              data:{email:email,password:password},

              success:function(data){
               
                if(data == '1')
                {
                   window.location.href="<?php echo SURL.'Doctor/doctor_review'?>"; 
                  
                    
                }
                else
                if(data == '2')
                {
                   window.location.href="<?php echo SURL.'Medical_assistant/assistant_view'?>"; 
                  
                    
                }
                else
                if(data == '3')
                {
                   window.location.href="<?php echo SURL.'Admin/manage_doctor'?>"; 
                  
                    
                }
               else
               {
                

                 $('#login').validate().showErrors({
                      "message" : "Email or Password is incorrect"
                      });
                 
               }
                
              }
             });
          }
          else
          {
            return false;
          }
    });
  });
 
</script> 