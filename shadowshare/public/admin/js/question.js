function edit_row(id) {
    var option1 = document.getElementById("option1" + id).innerHTML;

    var option2 = document.getElementById("option2" + id).innerHTML;
    var option3 = document.getElementById("option3" + id).innerHTML;
    var option4 = document.getElementById("option4" + id).innerHTML;

    document.getElementById("option1" + id).innerHTML = "<input type='text' id='option5" + id + "'  value='" + option1 + "'>";
    document.getElementById("option2" + id).innerHTML = "<input type='text' id='option6" + id + "' value='" + option2 + "'>";
    document.getElementById("option3" + id).innerHTML = "<input type='text' id='option7" + id + "' value='" + option3 + "'>";
    document.getElementById("option4" + id).innerHTML = "<input type='text' id='option8" + id + "' value='" + option4 + "'>";


    document.getElementById("edit" + id).style.display = "none";
    document.getElementById("save" + id).style.display = "block";
}

function save_row(question_id) {

    var option5 = document.getElementById("option5" + question_id).value;

    var option6 = document.getElementById("option6" + question_id).value;
    var option7 = document.getElementById("option7" + question_id).value;
    var option8 = document.getElementById("option8" + question_id).value;


    var id = question_id;




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
            // alert(response);
            alert("Data updated");
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

function view_question() {
    $("#a").html("<div></dv>");
    var option = document.getElementById("option").value;

    //alert(option);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/showq',
        dataType: 'json',
        data: {
            op: option
        },
        success: function (data) {
            //var a = JSON.parse(data);

            var len = 0;
            if (data != null) {
                var len = data.length;
            }

            if (len > 0) {
                var count = 0;
                // Read data and create <option >
                for (var i = 0; i < len; i++) {

                    var id = data[i].question_id;
                    var q = data[i].question;
                    var o1 = data[i].option_a;
                    var o2 = data[i].option_b;
                    var o3 = data[i].option_c;
                    var o4 = data[i].option_d;

                    // var option = "<p id='" + id + "'>" + q + "</p>";
                    // var op1 = "<option class='form-control' name='CAT_Custom_2' value='" + o1 + "'>" + o1 + "</option> ";
                    // var op2 = "<option  value='" + o2 + "'>" + o2 + "</option> ";
                    // var op3 = "<option  value='" + o3 + "'>" + o3 + "</option> ";
                    // var op4 = "<option  value='" + o4 + "'>" + o4 + "</option> ";
                    // //alert(option);

                    if (o1 == null && o2 == null && o3 == null && o4 == null) {
                        $("#a").append("<h2 class='fs-title'>Question " + count + "</h2> <h3 class='fs-subtitle'>" + q + "?</h3><input type='hidden' name='question" + count + "' value='" + id + "'<br>");
                        $("#a").append("<label>Choose Option </label></br><textarea class='form-control' name='answer" + count + "'   id='CAT_Custom_7' rows='4' onkeydown='if(this.value.length>=4000)this.value=this.value.substring(0,3999);' required></textarea>");
                    }

                    if (o1 && o2 && o3 && o4) {
                        $("#a").append("<h2 class='fs-title'>Question " + count + "</h2> <h3 class='fs-subtitle'>" + q + "?</h3><input type='hidden' name='question" + count + "' value='" + id + "'<br>");
                        $("#a").append("<label>Choose Option </label></br><select id='op1' class='form-control' name='answer" + count + "' required><option  value='" + o1 + "'>" + o1 + "</option><option  value='" + o2 + "'>" + o2 + "</option><option  value='" + o3 + "'>" + o3 + "</option><option  value='" + o4 + "'>" + o4 + "</option></select></br>");
                    }
                    count++;
                    // $("#").append(
                    //     "<p id='" + id + "'>" + q + "</p><div class=' form-group' style='Color:#ffff;width:87%;'><label>Choose Category </label><select id='op1 class='form-control default-select'><option  value='" + o1 + "'>" + o1 + "</option><option  value='" + o2 + "'>" + o2 + "</option><option  value='" + o3 + "'>" + o3 + "</option><option  value='" + o4 + "'>" + o4 + "</option></select></div>"
                    // );

                }
                $("#count").append("<input type='hidden' name='count' value='" + count + "'>");
                $("#a").append("<input type='submit' name='submit' class='genric-btn success-border medium' value='submit' />");


            }


            //$('#usersViewBody').html(data);
        }
    });
}
