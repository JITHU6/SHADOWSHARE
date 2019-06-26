function edit(id) {
    var option1 = document.getElementById("option1" + id).innerText;

    var option2 = document.getElementById("option2" + id).innerText;
    var option3 = document.getElementById("option3" + id).innerText;
    var option4 = document.getElementById("option4" + id).innerText;
    
    document.getElementById("option1" + id).innerHTML = "<input type='text'  id='option5" + id + "'  value='" + option1 + "'>";
    document.getElementById("option2" + id).innerHTML = "<input type='text' id='option6" + id + "' value='" + option2 + "'>";
    document.getElementById("option3" + id).innerHTML = "<input type='text' id='option7" + id + "' value='" + option3 + "'>";
    document.getElementById("option4" + id).innerHTML = "<input type='text' id='option8" + id + "' value='" + option4 + "'>";
    
    document.getElementById("edit" + id).style.display = "none";
    document.getElementById("save" + id).style.display = "block";
}

function save_row(fid) {
    alert("Data updated");
    var option5 = document.getElementById("option5" + fid).value;

    var option6 = document.getElementById("option6" + fid).value;
    var option7 = document.getElementById("option7" + fid).value;
    var option8 = document.getElementById("option8" + fid).value;
    
    var id = fid;
    
    document.getElementById("edit" + id).style.display = "block";
    document.getElementById("save" + id).style.display = "none";
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/updatecase',

        data: {
            //edit_row:'edit', 
            id: id,
            op1: option5,
            op2: option6,
            op3: option7,
            op4: option8,
           
        },
        success: function (response) {
            //console.log(response);
             //alert(response);
            
            if (response == "success") {
               
                document.getElementById("edit" + id).style.display = "block";
                document.getElementById("save" + id).style.display = "none";
                
            }
        }
    });
}
