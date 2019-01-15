 $('#submit_reg').click(function() {

     $("#register_form").validate({

    rules: {
        name: "required",
       email:{
          required: true,
          email: true,
         
       },
      password: {
            required: true,
            minlength: 8
        },
        confirm: {
            required: true,
            minlength: 8,
            equalTo: "#password"
        }
  },
    messages: {
       name_message: "Please enter your Name",
        email_message: "Please enter your Email Address",
        password_message: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
        },
        confirm_message: {
            required: "Please Confirm your password",
            minlength: "Your password must be at least 8 characters long",
            equalTo: "Please enter the same password as above"
        },
   }
    });
    });

