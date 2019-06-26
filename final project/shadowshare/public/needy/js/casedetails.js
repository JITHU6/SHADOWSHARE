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
          //console.log(data);
            //alert(data);
            if (data.length > 0) {
                $("#ccimage").html('');
                $("#cctitle").html('');
                $("#ccname").html('');
                $("#ccamount").html('');
                $("#ccequip").html('');
                $('#veri').html('');
                $("#vvimage").html('');
                $("#vvaddresss").html('');
                $("#qq1").html('');
                $("#aanswer1").html('');
                $("#cdate").html('');
                
                $('#veriad').html('');
                $('#eedescrip').html('');
                // Read data and create <option >

                var category_id = data[0].category_id;
                var catname = data[0].cat;
                var amount = data[0].amount;
                var equipname = data[0].equipname;

                var casetitle = data[0].casetitle;
                var caseimage = data[0].caseimage;
                
                var verification_address = data[0].verification_address;
                var verification_document = data[0].veri;
                var status = data[0].cstatus;
                var updated_at = data[0].updated_at;
                var des=data[0].edescription;
                if(data[0].equipmentid==null){
                array = [];
                array1 =[];
                var array = data[0].questions;
                //var question = data[0].questions;
                var answer = data[0].answer;
                // var array = question1.split(",");
                 var array1 = answer.split(",");
                for (i = 0; i < array.length; i++) {
                    var s = i + 1;

                    $('#qq1').append("<h6> " + s + " </h6>");
                    $('#qq1').append("<input type='text' id='q1" + array[i] + "' name='q1' class='form-control' style='color:green;background: transparent;border:none;' placeholder='' value='" + array[i] + "' readonly><br>");
                    
                    $('#qq1').append("<textarea class='form-control' id='answer1' name='answer1' rows='6' column='15' readonly>" + array1[i] +"</textarea>");
                    i + 1;
                }
                }
                //alert(array);

                // var updated_at = i + 1;
                
                $('#ccimage').append("<img class='card-img-top' id='cimage' name='cimage' src='/uploads/caseimage/" + caseimage + "'  alt='Card image cap' style='height:200px;width:200px;' readonly>");
                $('#cctitle').append(" <input type='text' id='ctitle' name='ctitle' class='form-control' placeholder='' value='" + casetitle + "' readonly>");
                $('#ccname').append("<input type='text' class='form-control' id='cname' name='cname' placeholder='' value='" + catname + "' readonly>");
                if(amount!=null){
                $('#ccamount').append("<label for=''><h5>Amount Requested</h5></label><input type='text' class='form-control' id='camount' name='camount' placeholder='' value='Rs." + amount + "' readonly>");
                }else{
                $('#ccequip').append("<label for=''><h5>Equipment Requested</h5></label><input type='text' class='form-control' id='cequip' name='cequip' placeholder='' value='" + equipname + "' readonly>");
            }
                $('#veri').append("<h5>Verification Document</h5>");
                // $('#ccequip').append("<input type='text' class='form-control' id='cequip' name='cequip' placeholder=''value='" + equipment_id + "' readonly>");
                $('#vvimage').append("<img class='card-img-top' id='vimage' name='vimage' src='/uploads/verify/" + verification_document + "'  alt='Card image cap' style='height:200px;width:200px;'>");
                //$('#vvimage').append("<input type='file' name='cfile' id='cfile' class='text-center file-upload form-control' accept='.png, .jpg, .jpeg,.JPG' style='width:70%;' onchange=''>");
                $('#veriad').append("<h5>Verification Address</h5>")
                $('#vvaddresss').append("<textarea class='form-control' id='vaddresss' name='vaddresss' rows='3' column='6' readonly>" + verification_address + "</textarea>");
                if(des!=null){
                $('#eedescrip').append("<textarea class='form-control' id='edescrip' name='edescrip' rows='6' column='6' readonly>" + des + "</textarea>");
            }
                
                $('#cdate').append("<label>" + updated_at + "</label>");
            
        }
        }
    });
}
