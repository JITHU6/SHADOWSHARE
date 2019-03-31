document.getElementById("fund").style.display = "none";
document.getElementById("equipment").style.display = "none";
function Change() {


    var el8 = document.getElementById('mode').value;
    if (el8 == 'equipment') {




        //this.removeAttribute('readonly');
        document.getElementById("fund").style.display = "none";
        document.getElementById("equipment").style.display = "block";


    }
    if (el8 == 'fund') {
        

            //this.removeAttribute('readonly');
            document.getElementById("fund").style.display = "block";
            document.getElementById("equipment").style.display = "none";

       
    }
}