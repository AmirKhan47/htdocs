<?php
if($this->session->has_userdata('id'))
{
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

    <title>Patient Registration</title>
  </head>
  <body style="background: url('<?php echo SURL.'assets/logo/medical-background-with-loop_n26ve-_yg__F0005.png';?>')no-repeat center;">
    <nav class="navbar navbar-light bg-info">
      <div class="container pl-0 m-0">
        <a class="navbar-brand text-light bg-light" href="#"><img src="<?php echo SURL.'assets/logo/logo1.jpg';?>" height="30px"/></a>
        <a class="navbar-brand text-light" href="#">Automated Patient Support System</a>
          <ul class="nav">
            <!-- <li class="nav-item text-light mr-5">Patient Registration</li> -->
            <li class="nav-item text-light mr-5">Welcome, Patient name</li>
            <li class="nav-item">
              <a class="text-light font-weight-bold" href="<?php echo SURL.'Dashboard/hospital';?>">Logout</a>
            </li>
          </ul>
      </div>
    </nav>
    <div class="container bg-light mt-3">
      <h1 class="text-center text-muted font-weight-light">Patient Registration</h1>
      <hr>

    <div class="row bg-light mt-5">
      <div class="col-md-8 mx-auto">
      <form class="form" autocomplete="off" id="patient_registration" action="<?php echo SURL.'Patient/patient_reg';?>" method="post">

        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" name="name" id="name" pattern="/^[A-Za-z]+$/" placeholder="Your name">
        </div>
        <label name="name_message"></label>

        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St">
        </div>
         <label name="address_message"></label>
        <div class="form-group">
          <label for="">CNIC</label>
          <input type="text" class="form-control" name="cnic" id="cnic" placeholder="1234512345671">
        </div>
        <label name="cnic_message" id="cnic"></label>
        <!-- <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div> -->
        <div class="form-group">
            <label for="Gender">Gender</label>
            <br/>
             <input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other"> Other 
        </div>
        
        <div class="form-group">
          <label for="">Phone</label>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="03xxxxxxxxxxx">
        </div>
        <label name="phone_message"></label>
       <input type="submit" name="patient_reg"  class="btn btn-info mb-3" id="patient_reg">
       
      </form>
    </div>
    </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  
  </body>
</html>
<script type="text/javascript">
  $('#patient_reg').click(function() {

     $("#patient_registration").validate({

    rules: {
        name: { 
          required:true,
          maxlength:15
          

      },
      address:{
        required:true,
        maxlength:50
      },
     
      cnic: {
        required:true,
        number: true,
        minlength:13,
        maxlength:13
       
      },
      phone:{
        required:true,
        number: true,
        minlength:11,
        maxlength:11

      }
  },
    messages: {
     name_message: {
            required: "Please enter your Name",
            maxlength: "Your name length must be within 15 characters only"
            
        },
          address_message: {
            required: "Please enter your Address",
            maxlength: "Your name length must be within 50 characters only",
            
        },
         cnic_message: {
            required: "Please enter your cnic",
            minlength: "Enter a valid cnic",
            maxlength: "Enter a valid cnic",
            number:"only Numbers are allowed"
         },
         phone_message: {
            required: "Please enter your phone",
            minlength: "Enter a valid phone number",
            maxlength: "Enter a valid phone number",
            number:"only Numbers are allowed"
         },
   }
    });
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#cnic').change(function(){
              
           var cnic = $('#cnic').val();
          
          if(cnic != '')
          {
           
             $.ajax({

              url:"<?php echo SURL.'Login/cnic_aviliable' ?>",

              method:"POST",
              data:{cnic:cnic},

              success:function(data){
                if(data == 'yes')
                {
                   $("input[type=submit]").attr("disabled", "disabled");
                     $('#patient_registration').validate().showErrors({
                      "cnic" : "CNIC already exists"
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
<?php
}
else
{
  redirect('Login/validate_user');
}
?>
