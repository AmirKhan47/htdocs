<?php
if($this->session->has_userdata('id'))
{ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Doctor | Double Pane</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</head>
<body>
        <nav class="navbar bg-info">
                <div class="container">
                    <a class="navbar-brand bg-light p-1" href="#"><img src="<?php echo SURL.'assets/logo/logo1.jpg'; ?>" alt="" height="40px;"></a>
                    <a href="" class="text-light">Register Assistant</a>
                    <a href="<?php echo SURL.'Admin/manage_doctor';?>" class="text-light">Admin Dashboard</a>
                   
                </div>
        </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-5 mx-auto bg-light p-3">
                <form method="post" autocomplete="off" id="add_doctor" action="<?php echo SURL.'Admin/add_assistant'; ?>">
                    
                    <div class="form-group">
                        <label for="doctorName">Assistant Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <label name="name_message"></label>
                    <div class="form-group">
                            <label for="doctorEmail">Assistant Email</label>
                            <input class="form-control" type="email" name="email">
                    </div>
                    <label name="email_message"></label>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <label name="password_message"></label>
                    <div class="text-center">
                        <!-- <button class="btn btn-info">ADD</button> -->
                        <input type="submit" id="submit_doctor" class="btn btn-info" name="add_doctor" value="ADD" >
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
     <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</body>
</html>
<script type="text/javascript">
  $('#submit_doctor').click(function() {

     $("#add_doctor").validate({

    rules: {
        name: { 
          required:true,
          maxlength:15
          

      },
      email:{
          required: true,
          email: true,
         
       },
     
     password: {
            required: true,
            minlength: 8
        }
     
  },
    messages: {
     name_message: {
            required: "Please enter your Name",
            maxlength: "Your name length must be within 15 characters only"
            
        },
          email_message: "Please enter your Email Address",
           password_message: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
        },
         
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