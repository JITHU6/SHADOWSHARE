$("form").validate({
    rules: {
        item_name: {
            required: true,
            pattern: "[a-zA-Z0-9][a-zA-Z0-9() ]+[a-zA-Z0-9()]$"

        },

        itemimage: {
            required: true,
            extension: "png|jpg|jpeg|JPG"
        },
        price: {
            required: true,
            pattern: "^[1-9][0-9]+$",
        
        },
        category: {
            required: true,

        },
        discription: {
            required: true,
            pattern: "^[a-zA-Z0-9][a-zA-Z0-9.,#()\r\n ]+$"
        },
        Pickup:{
            required: true,
            pattern: "^[a-zA-Z0-9][a-zA-Z0-9.,#\r\n ]+$"
        }
        
    },
    messages: {
        item_name: {
            required: "provide a case title",
            pattern: "Please provide a valid name"

        },
        itemimage: {
            required: "please upload an image",

        },        
        price: {
            required: "enter actual price",
            pattern: "Enter valid amount"
        },

        category: {
            required: "select a category"

        },
        discription: {
            required: "provide a description",
            pattern: "Enter valid description"
        },
       
        focusInvalid: false,
        onfocusout: function (element) {
            this.element(element);
        }
    }
});
