<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo SURL. 'assets/css/sign_up.css'?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
   
    <title>Registration</title>
  </head>
  <body style="background: url('<?php echo SURL.'assets/logo/medical-background-with-loop_n26ve-_yg__F0005.png';?>')no-repeat center;">
    <div class="container">
      <div class="row main">
        <div class="main-login main-center">
        <h5>Register Yourself</h5>
          <form class="" method="post" autocomplete="off" id="register_form" action="<?php echo SURL.'Login/register'?>" >

            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Your Name</label>
              <div class="col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name" id="name" data-validation="required"  placeholder="Enter your Name"/>
                </div>
              </div>
                             </div>
                            <div name="name_message"></div>
            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Your Email</label>
              <div class="col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                </div>
              </div>
            </div>
                          <div id="email_message" name="email_message"></div>
            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                </div>
              </div>
            </div>
                         <div name="password_message"></div>
            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
              <div class="col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                </div>
              </div>
            </div>
            <div class="form-group col-md-8">
      <label for="inputState">State</label>
      <select id="inputState" name="type" class="form-control" required="required">
        <option selected="" value="">Choose...</option>
        <option value="1">Doctor</option>
        <option value="2">Medical Assistant</option>
      </select>
    </div>
                           <div name="confirm_message"></div>
            <div class="form-group ">
              <input type="submit" name="submit_reg" id="submit_reg"   class="btn btn-primary btn-lg btn-block login-button" value="Register">
             <p>Already have an account? <a style="color: white;" href="<?php echo SURL.'Login/validate_user';?>">Sign In
             </a></p>
            </div>

          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?php echo SURL.'assets/js/jquery_validation.js' ?>"></script> 
  
  </body>
</html>
 <script type="text/javascript">
  $(document).ready(function(){
    $('#email').change(function(){
              
           var email = $('#email').val();

          if(email != '')
          {

             $.ajax({

              url:"<?php echo SURL.'Login/email_aviliable' ?>",

              method:"POST",
              data:{email:email},

              success:function(data){
                
                if(data == 'yes')
                {
                   $("input[type=submit]").attr("disabled", "disabled");
                     $('#register_form').validate().showErrors({
                      "email" : "Email already exists"
                     });
                }
                else
                {
                   $("input[type=submit]").removeAttr("disabled");
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


 