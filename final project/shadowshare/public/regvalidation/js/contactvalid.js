$("form").validate({
    rules: {
       
        yourname: {
            required: true,
            pattern:"[a-zA-Z][a-zA-Z ]+[a-zA-Z]$"
  
        },
       
        yourphone :{
          required: true,
          pattern:"[0-9]{10}$|^[0-9]{12}$"
        },
        youremail: {
            required: true,
            email: true,
  
        },
        yoursubject:{
          required : true,
          pattern:"^[a-zA-Z0-9][a-zA-Z0-9.,()\r\n ]+$"
        },
        yourmessage:{
          required : true,
          pattern:"^[a-zA-Z0-9][a-zA-Z0-9.,()\r\n ]+$"
        },
        
},
    messages: {
       
        yourphone:{
          required:'Enter mobile number',
          pattern:'enter valid mobile number'
        },
        yoursubject:{
          required:'Enter subject',
          pattern:'enter valid  subject'
        },
        yourmessage:{
          required:'Enter your response',
          pattern:'enter valid  response'
        },
        youremail: 'Enter a valid email',
        pincode:{
          required:'Enter pincode',
          pattern:'enter valid  6 digit pincode'
        },
        yourname: {
        required: 'enter full name',
        pattern:'enter valid name'

        },
        
    },
    focusInvalid: false,
    onfocusout: function(element) {
      this.element(element);
  },
   
  });