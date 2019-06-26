$("form").validate({
    rules: {
        cname: {
            required: true,
            pattern:"[a-zA-Z][a-zA-Z ]+[a-zA-Z]$"
  
        },
        
    },
    messages: {
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