$("form").validate({
  rules: {
    file: {
      
      extension: "png|jpg|jpeg|JPG"

  },
      name: {
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
      add1:{
        required : true,
        pattern:"^[a-zA-Z0-9][a-zA-Z0-9.,:()\r\n ]+$"
      },
      add2:{
        required : true,
        pattern:"^[a-zA-Z0-9][a-zA-Z0-9.,:()\r\n ]+$"
      },
      state:{
        required : true,
       
      },
      district:{
        required : true,
       
      },
      panchayath:{
        required : true,
       
      },
      pincode:{
        required : true,
        pattern:"^[1-9][0-9]{5}$"
      },
      password:{
        required : true,
        pattern:"^[a-zA-Z0-9@*#]([a-zA-Z0-9@*#?.]{4,15})$"
        
      },
      cpassword:{
        required : true,
        equalTo:"#password"
        
      },
      cname: {
        required: true,
        pattern:"[a-zA-Z][a-zA-Z ]+[a-zA-Z]$"

    },
    catname: {
      required: true,
      
  },
    
  },
  messages: {
      name: {
        required:'enter your full name',
        pattern:'enter valid name'
      },
      phone:{
        required:'Enter mobile number',
        pattern:'enter valid mobile number'
      },
      add1:{
        required:'Enter address field 1',
        pattern:'enter valid  address'
      },
      add2:{
        required:'Enter address field 2',
        pattern:'enter valid  address'
      },
      email: 'Enter a valid email',
      pincode:{
        required:'Enter pincode',
        pattern:'enter valid  6 digit pincode'
      },
      password:{
        required:'Enter password',
        pattern:'minimum password length is 5'
      },
      cname: {
        required:'enter category name',
        pattern:'enter valid category name'
      },
  },
  focusInvalid: false,
  onfocusout: function(element) {
    this.element(element);
},
 
});