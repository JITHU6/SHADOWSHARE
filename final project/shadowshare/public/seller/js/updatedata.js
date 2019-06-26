function update() {

    var image = document.getElementById('itemimage').value;
    var ename= document.getElementById('ename').value;
    var des= document.getElementById('des').value;
    var pick= document.getElementById('pick').value;
    var eid= document.getElementById('eid').value;
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/updateeqdata',

        data: {
            eid:eid,
            name: ename,
            image:image,
            about:des,
            pickup:pick
        },
        success: function (data) {
            //console.log(response);
            // alert(response);
            if (data.length > 0) {
                // Read data and create <option >

                var image = data[0].cimage;
                var cat = data[0].cname;
                var name = data[0].cname;
                var price = data[0].price;
                var condition = data[0].condition;
                var description = data[0].description;
                var pickupaddress = data[0].pickupaddress;
                var updated_at = data[0].updated_at;
                // var updated_at = i + 1;
                $("#image").html('');
                $("#name").html('');
                $("#price").html('');
                $("#cat").html('');
                $("#about").html('');
                $("#cond").html('');
                $("#picka").html('');
                $("#date").html('');

                $('#image').append("<img src='/uploads/equipment/" + image + "'  name='eimage' id='imagea' class=''>");
                $('#image').append("<div id='imageup'><h6>Upload photo of Item</h6><input type='file' name='itemimage' id='itemimage' class='text-center center-block file-upload'  accept='.png, .jpg, .jpeg,.JPG' onchange='readURL(this);' required></div>");
                $('#name').append("<input type='text'  name='ename' id='ename'  class='form-control '  value='" + name + " ' readOnly>");
                $('#cat').append("<input type='text'  name='ecat' id='ecat' class='form-control '  value='" + cat + " ' readOnly>");
                $('#about').append("<input type='text'  name='des' id='des' class='form-control '  value='" + description + " ' readOnly>");
                $('#cond').append("<input type='text'  name='cond' id='cond' class='form-control '  value='" + condition + " ' readOnly>");
                $('#price').append("<input type='text'  name='price' id='price' class='form-control '  value='" + price + " ' readOnly>");
                $('#picka').append("<textarea name='pick' id='pick' class='form-control ' readonly >" + pickupaddress + "</textarea>");
                $('#date').append("<input type='text'  name='edate' id='edate' class='form-control '  value='" + updated_at + " ' readOnly>");
            }

        }
    });
}
