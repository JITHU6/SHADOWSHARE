function n() {

    var valname = /^[a-zA-Z]+[\-'\s]?[a-zA-Z ]+$/;
    $name = document.getElementById('name').value;

    if (!valname.test($name)) {

        alert("Enter valid name");
        document.getElementById('name').value = '';
        $("#name").focus();
        return false;
    }

}



function p() {
    var val_phone = /^[0-9]{9,12}$/;
    $phone = document.getElementById('phone').value;


    if (!val_phone.test($phone)) {
        alert("enter valid phone Number ");
        document.getElementById('phone').value = '';
        $("#phone").focus();
        return false;
    }
}


function u() {
    var val_username = /^[A-Za-z][A-Za-z0-9]{3,20}$/;
    $username = document.getElementById('username').value;


    if (!val_username.test($username)) {
        alert("Enter valid Username");
        document.getElementById('username').value = '';
        $("#username").focus();
        return false;

    }
}



function ps() {
    var val_password = /^[A-Za-z]\w{5,14}$/;
    $password = document.getElementById('password').value;


    if (!val_password.test($password)) {
        alert("Enter valid password! first character must be a letter");
        document.getElementById('password').value = '';
        $("#password").focus();
        return false;
    }
}





function em() {
    var val_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    $email = document.getElementById('email').value;


    if (!val_email.test($email)) {
        alert("Enter valid email");
        document.getElementById('email').value = '';
        $("#emaild").focus();
        return false;
    }
}





function ct() {
    var val_contact = /^[0-9]{9,12}$/;
    $contact = document.getElementById('contact').value;


    if (!val_contact.test($contact)) {
        alert("enter valid phoneno ");
        document.getElementById('contact').value = '';
        $("#contact").focus();
        return false;
    }
}





function cd() {
    var val_card = /^(?:5[1-5][0-9]{14})$/;
    $card = document.getElementById('card').value;


    if (!val_card.test($card)) {
        alert("enter valid card ");
        document.getElementById('card').value = '';
        $("#card").focus();
        return false;
    }
}





function cv() {
    var val_cvv = /^[0-9]{3,4}$/;
    $cvv = document.getElementById('cvv').value;


    if (!val_cvv.test($cvv)) {
        alert("enter valid cvv ");
        document.getElementById('cvv').value = '';
        $("#cvv").focus();
        return false;
    }
}