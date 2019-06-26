function edit_row(id) {
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

function save_row(question_id) {
    alert("Data updated");
    var option5 = document.getElementById("option5" + question_id).value;

    var option6 = document.getElementById("option6" + question_id).value;
    var option7 = document.getElementById("option7" + question_id).value;
    var option8 = document.getElementById("option8" + question_id).value;

    var id = question_id;
    
    document.getElementById("edit" + id).style.display = "block";
    document.getElementById("save" + id).style.display = "none";
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/updatequestion',

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
                document.getElementById("option1" + id).innerHTML = option5;
                document.getElementById("option2" + id).innerHTML = option6;
                document.getElementById("option3" + id).innerHTML = option7;
                document.getElementById("option4" + id).innerHTML = option8;
                document.getElementById("edit" + id).style.display = "block";
                document.getElementById("save" + id).style.display = "none";
                
            }
        }
    });
}

function delete_row(id) {
    $.ajax({
        type: 'post',
        url: 'modify_records.php',
        data: {
            delete_row: 'delete_row',
            row_id: id,
        },
        success: function (response) {
            if (response == "success") {
                var row = document.getElementById("row" + id);
                row.parentNode.removeChild(row);
            }
        }
    });
}

function insert_row() {
    var name = document.getElementById("new_name").value;
    var age = document.getElementById("new_age").value;

    $.ajax({
        type: 'post',
        url: 'modify_records.php',
        data: {
            insert_row: 'insert_row',
            name_val: name,
            age_val: age
        },
        success: function (response) {
            if (response != "") {
                var id = response;
                var table = document.getElementById("user_table");
                var table_len = (table.rows.length) - 1;
                var row = table.insertRow(table_len).outerHTML = "<tr id='row" + id + "'><td id='name_val" + id + "'>" + name + "</td><td id='age_val" + id + "'>" + age + "</td><td><input type='button' class='edit_button' id='edit_button" + id + "' value='edit' onclick='edit_row(" + id + ");'/><input type='button' class='save_button' id='save_button" + id + "' value='save' onclick='save_row(" + id + ");'/><input type='button' class='delete_button' id='delete_button" + id + "' value='delete' onclick='delete_row(" + id + ");'/></td></tr>";

                document.getElementById("new_name").value = "";
                document.getElementById("new_age").value = "";
            }
        }
    });
}
