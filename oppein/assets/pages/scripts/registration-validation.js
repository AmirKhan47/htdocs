$('#submit').click(function(){
    $("registration-form").validate({
        rules:{
            designation:{
                required:true
            },
            title:{
                required:true
            },
            name:{
                required:true
            },
            phone:{
                required:true
            },
            phone:{
                required:true
            },
            date:{
                required:true

            },
            category:{
                required:true

            }
        }
    });

});