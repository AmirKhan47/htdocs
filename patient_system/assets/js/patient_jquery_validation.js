$('#patient_reg').click(function() {

     $("#patient_registration").validate({

    rules: {
        name: { 
          required:true,
          maxlength:15, 
          lettersonly:true

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
       // name_message: "Please enter your Name",
        // address_message: "Please enter your Address",
        
        // cnic_message: "Please enter your CNIC",
        // phone_message: "Please enter your Phone Number",



        name_message: {
            required: "Please enter your Name",
            maxlength: "Your name length must be within 15 characters only",
            lettersonly:"Only alphabets are allowed"
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

        // confirm_message: {
        //     required: "Please Confirm your password",
        //     minlength: "Your password must be at least 8 characters long",
        //     equalTo: "Please enter the same password as above"
        // },
   }
    });
    });