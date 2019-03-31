function more(case_id) {

    var id = case_id;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/getcasedata',

        data: {

            eid: id,
        },
        success: function (data) {
            //console.log(response);
            //alert(data);
            if (data.length > 0) {
                // Read data and create <option >



                var category_id = data[0].category_id;
                var amount = data[0].amount;
                var equipment_id = data[0].equipment_id;
                var casetitle = data[0].casetitle;
                var caseimage = data[0].caseimage;
                var question = data[0].question;
                var answer = data[0].answer;
                var verification_address = data[0].verification_address;
                var verification_document = data[0].verification_document;
                var status = data[0].status;
                var updated_at = data[0].updated_at;

                // var updated_at = i + 1;
                $("#ccimage").html('');
                $("#cctitle").html('');
                $("#ccname").html('');
                $("#ccamount").html('');
                $("#ccequip").html('');
                $("#vvimage").html('');
                $("#vvaddresss").html('');
                $("#qq1").html('');
                $("#aanswer1").html('');
                $("#cdate").html('');

                $('#ccimage').append("<img class='card-img-top' id='cimage' name='cimage' src='/uploads/caseimage/" + caseimage + "'  alt='Card image cap' rea>");
                $('#cctitle').append(" <input type='text' id='ctitle' name='ctitle' class='form-control' placeholder='' value='" + casetitle + "'>");
                $('#ccname').append("<input type='text' class='form-control' id='cname' name='cname' placeholder='' value='" + category_id + "'>");
                $('#ccamount').append("<input type='text' class='form-control' id='camount' name='camount' placeholder='' value='" + amount + "'>");
                $('#ccequip').append("<input type='text' class='form-control' id='cequip' name='cequip' placeholder=''value='" + equipment_id + "'>");
                $('#vvimage').append("<img class='card-img-top' id='vimage' name='vimage' src='/uploads/verify/" + verification_document + "'  alt='Card image cap'>");
                //$('#vvimage').append("<input type='file' name='cfile' id='cfile' class='text-center file-upload form-control' accept='.png, .jpg, .jpeg,.JPG' style='width:70%;' onchange=''>");
                $('#vvaddresss').append("<textarea class='form-control' id='vaddresss' name='vaddresss' rows='3' column='6'>" + verification_address + "</textarea>");
                $('#qq1').append("<input type='text' id='q1' name='q1' class='form-control' placeholder='' value='" + question + "'>");
                $('#aanswer1').append("<input type='text' id='answer1' name='answer1' class='form-control' placeholder='' value='" + answer + "'>");
                $('#cdate').append("<label>" + updated_at + "</label>");
            }





        }
    });
}
