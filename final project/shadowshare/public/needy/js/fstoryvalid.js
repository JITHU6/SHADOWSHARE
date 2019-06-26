$("form").validate({
    rules: {

        vaddress: {
            required: true,
            pattern: "^[a-zA-Z0-9][a-zA-Z0-9.,():\r\n ]+$"
        },
        casetitle: {
            required: true,
            pattern: "[a-zA-Z0-9][a-zA-Z0-9#,. ]+[a-zA-Z0-9,.]$"

        },

        casefile: {
            required: true,
            extension: "png|jpg|jpeg|JPG"

        },
        amount: {
            required: true,
            pattern: "^[1-9][0-9]+$"
        },
        file: {
            required: true,
            extension: "png|jpg|jpeg|JPG"

        },
        answer: {
            required: true,
            pattern: "^[a-zA-Z0-9][a-zA-Z0-9.,(,),[,]\r\n ]+$"
        },
        discription: {
            required: true,
            pattern: "^[a-zA-Z0-9][a-zA-Z0-9.,#\r\n ]+$"
        },
    },
    messages: {
        casetitle: {
            required: "provide a case title",
            pattern: "Please provide a valid title"

        },
        vaddress: {
            required: "provide a verification addrees",
            pattern: "please provide a valid address"
        },
        amount: {
            required: "enter amount required",
            pattern: "Enter valid amount"
        },

        casefile: {
            required: "please upload a verification document image",

        },
        file: {
            required: "upload an image",

        },
        answer: {
            required: "provide a response",
            pattern: "Enter valid response"
        },
        focusInvalid: false,
        onfocusout: function (element) {
            this.element(element);
        }
    }
});
