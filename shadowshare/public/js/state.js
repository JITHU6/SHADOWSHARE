$(document).ready(function () {
    $('select[name="state"]').on('change', function () {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/dist/ajax/' + stateID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="district"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="district"]').append('<option value="' + value.district_id + '">' + value.dname + '</option>');
                    });
                }
            });
        } else {
            $('select[name="district"]').empty();
        }
    });
});

$(document).ready(function () {
    $('select[name="district"]').on('change', function () {
        var distID = $(this).val();
        if (distID) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/city/ajax/' + distID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="panchayath"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="panchayath"]').append('<option selected value="' + value.panchayath_id + '">' + value.pname + '</option>');
                    });
                }
            });
        } else {
            $('select[name="panchayath"]').empty();
        }
    });
});

