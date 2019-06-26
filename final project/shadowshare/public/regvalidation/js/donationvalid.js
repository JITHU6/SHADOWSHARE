$("form").validate({
    rules: {
        country:{
            required : true,
           
          },
        city: {
            required: true,
            pattern:"[a-zA-Z][a-zA-Z ]+[a-zA-Z]$"
  
        },
        state:{
            required : true,
           
          },
        firstname: {
            required: true,
            pattern:"[a-zA-Z][a-zA-Z ]+[a-zA-Z]$"
  
        },
        lastname: {
            required: true,
            pattern:"[a-zA-Z][a-zA-Z ]+[a-zA-Z]$"
  
        },
        occu: {
            required: true,
            pattern:"[a-zA-Z][a-zA-Z ]+[a-zA-Z]$"
  
        },
        phone :{
          required: true,
          pattern:"[0-9]{10}$|^[0-9]{12}$"
        },
        email: {
            required: true,
            email: true,
  
        },
        address1:{
          required : true,
          pattern:"^[a-zA-Z0-9][a-zA-Z0-9.,():\r\n ]+$"
        },
        address2:{
          required : true,
          pattern:"^[a-zA-Z0-9][a-zA-Z0-9.,():\r\n ]+$"
        },
        amount: {
            required: true,
            pattern: "^[1-9][0-9]+$"
       
    },
},
    messages: {
        city: {
          required:'enter your city name',
          pattern:'enter valid city  name'
        },
        phone:{
          required:'Enter mobile number',
          pattern:'enter valid mobile number'
        },
        address1:{
          required:'Enter address field 1',
          pattern:'enter valid  address'
        },
        address2:{
          required:'Enter address field 2',
          pattern:'enter valid  address'
        },
        email: 'Enter a valid email',
        pincode:{
          required:'Enter pincode',
          pattern:'enter valid  6 digit pincode'
        },
        firstname: {
        required: 'enter firstname',
        pattern:'enter valid name'

        },
        lastname: {
            required: 'enter lastname',
        pattern:'enter valid name'

        },
        occu: {
            required:'provide occupation ',
            pattern:'please enter valid occupation'

        },
        amount: {
            required: "enter amount required",
            pattern: "Enter valid amount"
        },
        
    },
    focusInvalid: false,
    onfocusout: function(element) {
      this.element(element);
  },
   
  });