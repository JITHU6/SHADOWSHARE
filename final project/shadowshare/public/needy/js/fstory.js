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
                var count = 1;
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
                        $("#a").append("<h2 class='fs-title'>Question " + count + "</h2> <h3 class='fs-subtitle' style='color:yellow;background: transparent;border:none;'>" + q + "?</h3><input type='hidden' name='question" + count + "' value='" + id + "'<br>");
                        $("#a").append("<label>Choose Option </label></br><textarea class='form-control' style='' name='answer"  + count + "'   id='CAT_Custom_7' rows='4' onkeydown='if(this.value.length>=4000)this.value=this.value.substring(0,3999);' ></textarea>");
                    }

                    if (o1 && o2 && o3 && o4) {
                        $("#a").append("<h1 class='fs-title'>Question " + count + "</h1> <h3 class='fs-subtitle' style='color:yellow;background: transparent;border:none;'>" + q + "?</h3><input type='hidden' name='question" + count + "' value='" + id + "'<br>");
                        $("#a").append("<label>Choose Option </label></br><select id='op1' class='form-control' style=''  name='answer" + count + "' required><option  value='" + o1 + "'>" + o1 + "</option><option  value='" + o2 + "'>" + o2 + "</option><option  value='" + o3 + "'>" + o3 + "</option><option  value='" + o4 + "'>" + o4 + "</option></select></br>");
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