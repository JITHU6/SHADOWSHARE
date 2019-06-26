function needycasedetails(case_id) {

    var id = case_id;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/needydetailsmodal',

        data: {

            eid: id,
        },
        success: function (data) {
            console.log(data);
            //alert(data);
            if (data.length > 0) {
                // Read data and create <option >

                var category_id = data[0].category_id;
                var catname = data[0].categoryname;
                var amount = data[0].amount;
                var equipname = data[0].cname;
                var needyname = data[0].name;
                var case_id = data[0].case_id;
                //var equipment_id = data[0].equipment_id;
                var casetitle = data[0].casetitle;
                var caseimage = data[0].caseimage;
                var question = data[0].question;
                var question1 = data[0].questions;
                var answer = data[0].answer;
                var verification_address = data[0].verification_address;
                var verification_document = data[0].verification_document;
                var status = data[0].status;
                var updated_at = data[0].created_at;

                array = [];
                var array = question.split(",");
                var array1 = answer.split(",");
                //alert(array);

                // var updated_at = i + 1;
                $("#ccimage").html('');
                $("#cctitle").html('');
                $("#uuname").html('');
                $("#ccname").html('');
                $("#ccamount").html('');
                $("#ccequip").html('');
                $("#vvimage").html('');
                $("#vvaddresss").html('');
                $("#qq1").html('');
                $("#aanswer1").html('');
                $("#cdate").html('');
                $('#veri').html('');
                $('#veriad').html('');
               
                $('#ccimage').append("<img class='card-img-top col-10' id='cimage' name='cimage' src='/uploads/caseimage/" + caseimage + "'  alt='Card image cap' style='height:200px;' readonly><br>");
                // $('#cctitle').append(" <label>" + casetitle + "</label>");
                $('#uuname').append(" <input type='text' id='uname' name='uname' class='form-control' placeholder='' value='" + needyname + "' readonly>");
                $('#uuname').append(" <input type='hidden'  name='case_id' value='" + case_id + "'>");
                // $('#uuname').append(" <input type='hidden'  name='equipment_id' value='" + equipment_id + "'>");
                $('#ccname').append("<input type='text' class='form-control' id='cname' name='cname' placeholder='' value='" + catname + "' readonly>");
                $('#ccamount').append("<label for=''><h5>Amount Requested</h5></label><input type='text' class='form-control' id='camount' name='camount' placeholder='' value='Rs." + amount + "' readonly>");
                $('#veri').append("<h5>Verification Document</h5>");
                // $('#ccequip').append("<input type='text' class='form-control' id='cequip' name='cequip' placeholder=''value='" + equipment_id + "' readonly>");
                $('#vvimage').append("<img class='card-img-top' id='vimage' name='vimage' src='/uploads/verify/" + verification_document + "' style='height:250px;width:250px;' alt='Card image cap'>");
                //$('#vvimage').append("<input type='file' name='cfile' id='cfile' class='text-center file-upload form-control' accept='.png, .jpg, .jpeg,.JPG' style='width:70%;' onchange=''>");
                $('#veriad').append("<h5>Verification Address</h5>");
                $('#cdate').append("<label>" + updated_at + "</label>");
                $('#vvaddresss').append("<textarea class='form-control' id='vaddresss' name='vaddresss' rows='3' column='6' readonly>" + verification_address + "</textarea>");

                for (i = 0; i < array.length; i++) {
                    var s = i + 1;

                    $('#qq1').append("<h5 style='color:green;background: transparent;border:none;'>Question " + s + "</h5>");
                    $('#qq1').append("<input type='text' id='q1" + array[i] + "' name='q1' class='form-control' placeholder='' value='" + question1[i] + "' readonly><br>");
                    $('#qq1').append("<h6>Response</h6>");
                    $('#qq1'). append("<textarea id='answer1' style='background: transparent;' name='answer1' class='form-control'  rows='2' column='6' readonly>" + array1[i] +  "</textarea>");
                    
                    i + 1;
                }

            }

        }
    });
}
