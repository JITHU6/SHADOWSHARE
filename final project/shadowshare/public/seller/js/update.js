//update profile
var el11= document.getElementById('up');

el11.onclick = function () {
    var el1 = document.getElementById('ename').removeAttribute('readonly');
    var el3 = document.getElementById('des').removeAttribute('readonly');
    var el4 = document.getElementById('pick').removeAttribute('readonly');

    //this.removeAttribute('readonly');

    document.getElementById("imageup").style.display = "block";
    document.getElementById("up").style.display = "none";
    document.getElementById("done").style.display = "block";

};

var el12 = document.getElementById('done');

el12.onclick = function () {
    var el1 = document.getElementById('ename').readOnly = true;
    var el3 = document.getElementById('des').readOnly = true;
    var el4 = document.getElementById('pick').readOnly = true;
    //this.removeAttribute('readonly');
    document.getElementById("imageup").style.display = "none";
    document.getElementById("up").style.display = "block";
    document.getElementById("done").style.display = "none";
};
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagea')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
//update itemdetails
