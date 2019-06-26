function morea(case_id) {

    var id = case_id;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/history',

        data: {

            eida: id,
        },
        success: function (data) {
           // console.log(data);
            //alert(data);
            if (data.length > 0) {
                // Read data and create <option >
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
                $('#veri').html('');
                $('#veriad').html('');
                $('#eedeslabel').html('');
                $('#eedes').html('');
                var category_id = data[0].category_id;
                var catname = data[0].cat;
                var amount = data[0].amount;
                var equipname = data[0].equipname;

                var casetitle = data[0].casetitle;
                var caseimage = data[0].caseimage;
                
                var verification_address = data[0].verification_address;
                var verification_document = data[0].verification_document;
                var status = data[0].cstatus;
                var updated_at = data[0].updated_at;
                var edes=data[0].edescription;
                //alert(array);

                // var updated_at = i + 1;
                
                $('#ccimage').append("<img class='card-img-top' id='cimage' style='height:200px;width:250px;' name='cimage' src='/uploads/caseimage/" + caseimage + "'  alt='Card image cap' readonly>");
                $('#cctitle').append(" <input type='text' id='ctitle' name='ctitle' class='form-control' placeholder='' value='" + casetitle + "' readonly>");
                $('#ccname').append("<input type='text' class='form-control' id='cname' name='cname' placeholder='' value='" + catname + "' readonly>");
                if(amount!=null){
                $('#ccamount').append("<label for=''><h5>Amount Recieved</h5></label><input type='text' class='form-control' id='camount' name='camount' placeholder='' value='Rs." + amount + "' readonly>");
                }
                else{
                $('#ccequip').append("<label for=''><h5>Item Recieved</h5></label><input type='text' class='form-control' id='cequip' name='cequip' placeholder='' value='" + equipname + "' readonly>");
                $('#eedeslabel').append("<h5>Description</h5>")
                $('#eedes').append("<textarea class='form-control' id='vaddresss' name='vaddresss' rows='3' column='6' readonly>" + edes + "</textarea>");
            }
               $('#veri').append("<h5>Verification Document</h5>");
                // $('#ccequip').append("<input type='text' class='form-control' id='cequip' name='cequip' placeholder=''value='" + equipment_id + "' readonly>");
                $('#vvimage').append("<img class='card-img-top' style='height:200px;width:200px;' id='vimage' name='vimage' src='/uploads/verify/" + verification_document + "'  alt='Card image cap'>");
                //$('#vvimage').append("<input type='file' name='cfile' id='cfile' class='text-center file-upload form-control' accept='.png, .jpg, .jpeg,.JPG' style='width:70%;' onchange=''>");
                $('#veriad').append("<h5>Verification Address</h5>")
                $('#vvaddresss').append("<textarea class='form-control' id='vaddresss' name='vaddresss' rows='3' column='6' readonly>" + verification_address + "</textarea>");

                $('#cdate').append("<label>" + updated_at + "</label>");
            }

        }
    });
}
