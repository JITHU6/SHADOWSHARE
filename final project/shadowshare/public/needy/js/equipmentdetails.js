function equipdetails(equipment_id) {

    var id = equipment_id;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/getequipdata',

        data: {

            eid: id,
        },
        success: function (data) {
            console.log(data);
            //alert(data);
            if (data.length > 0) {
                // Read data and create <option >
                var sname = data[0].sellername;
                var sphon = data[0].phonenumber;
                var equip_id = data[0].equipment_id;
                var category_id = data[0].category_id;
                var category = data[0].category;
                var itemname = data[0].cname;
                var amount = data[0].price;
                var condition = data[0].condition;
                var description = data[0].description;
                var image = data[0].cimage;
                var pickupaddress = data[0].pickupaddress;

                var updated_at = data[0].updated_at;

                //alert(array);

                // var updated_at = i + 1;
                $("#sname").html('');
                $("#sphone").html('');
                
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

                $('#ccimage').append("<img class='' id='cimage' style='width:200px;height:150px;' name='cimage' src='/uploads/equipment/" + image + "'  alt='Card image cap' readonly>");
                $('#cctitle').append(" <input type='text' id='itemname' name='itemname' class='form-control' placeholder='' value='" + itemname + "' readonly>");
                $('#ccname').append("<input type='text' class='form-control' id='cname' name='cname' placeholder='' value='" + category + "' readonly>");
                $('#ccamount').append("<input type='text' class='form-control' id='camount' name='camount' placeholder='' value='Rs." + amount + "' readonly>");
                $('#ccequip').append("<input type='text' class='form-control' id='condition' name='condition' placeholder='' value='" + condition + "' readonly>");
                $('#vvimage').append("<textarea class='form-control' id='description' name='description' rows='3' column='6' readonly>" + description + "</textarea>");
                //$('#vvimage').append("<input type='file' name='cfile' id='cfile' class='text-center file-upload form-control' accept='.png, .jpg, .jpeg,.JPG' style='width:70%;' onchange=''>");
                $('#vvaddresss').append("<textarea class='form-control' id='pickupaddress' name='pickupaddress' rows='3' column='6' readonly>" + pickupaddress + "</textarea>");
                $('#cdate').append("<label>" + updated_at + "</label>");
                $('#eid').append("<input type='hidden' class='form-control' id='eid' name='eid' value='" + equip_id + "' readonly>");
                $('#eid').append("<input type='hidden' class='form-control' id='cid' name='cid' value='" + category_id + "' readonly>");
                $('#sname').append("<label>" + sname + "</label>");
                $('#sphone').append("<label>" + sphon + "</label>");
            }

        }
    });
}
