var el10 = document.getElementById('updateimage');
el10.onclick = function () {
    document.getElementById('file').required = true;
}


var el8 = document.getElementById('edit');

el8.onclick = function () {
    document.getElementById('name').removeAttribute('readonly');
    document.getElementById('add1').removeAttribute('readonly');
    document.getElementById('add2').removeAttribute('readonly');

    document.getElementById('state').removeAttribute('disabled');
    document.getElementById('district').removeAttribute('disabled');
    document.getElementById('panchayath').removeAttribute('disabled');
    document.getElementById('pincode').removeAttribute('readonly');
    document.getElementById("panchayath").removeAttribute('readonly');
    //this.removeAttribute('readonly');

    document.getElementById("edit").style.display = "none";
    document.getElementById("update").style.display = "block";
    //document.getElementById("reset").style.display = "block";
   
};




var el9 = document.getElementById('update');

el9.onclick = function () {
    document.getElementById('name').readOnly = true;
    document.getElementById('add1').readOnly = true;
    document.getElementById('add2').readOnly = true;

    document.getElementById('state').disabled = true;
    document.getElementById('district').disabled = true;
    
    document.getElementById('pincode').readOnly = true;
    document.getElementById("panchayath").readOnly = true;

    //this.removeAttribute('readonly');
    
    document.getElementById("edit").style.display = "block";
    document.getElementById("update").style.display = "none";
    //document.getElementById("reset").style.display = "block";
};
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}