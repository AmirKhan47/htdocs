$().ready(function(){
	$("#form1").validate({
		rules:
		{
			name:
			{
             required: "true",
			 minlength: 3
			},
			email:
			{
				required: "true"
			}
		},
    messages: {
    	name:
    	{
    		required: "Please enter name",

    	}
    	email: {
    		required: "Please enter email"
    	}
    }


	});
});