$("form").validate({
    rules: {

        ename: {

            pattern: "[a-zA-Z0-9][a-zA-Z0-9() ]+[a-zA-Z0-9()]$"

        },
        des: {

            pattern: "^[a-zA-Z0-9][a-zA-Z0-9.,()#\r\n ]+$"
        },
        pick: {

            pattern: "^[a-zA-Z0-9][a-zA-Z0-9().,#\r\n ]+$"
        },

    },
    messages: {

        des: {

            pattern: "Enter valid description"
        },
        ename: {

            pattern: "Please provide a valid name"

        },
        pick: {

            pattern: "Please provide a valid address"
        },
        focusInvalid: false,
        onfocusout: function (element) {
            this.element(element);
        }
    }
});
