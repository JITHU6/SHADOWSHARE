@if(session()->has('status2'))
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

    @include('admin.nav')

    <div id="wrapper">
        @include('admin.sidebar')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Equipment Donors</div>
                    <div class="card-body">

                        <button type="submit" style="margin-top:0%;color:blue;;margin-left:90%;"
                            class="btn btn-success-outline right" onclick="createPDF()">Download</button>
                        <div class="table-responsive" id="record">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Phone</th>
                                        <th>Equipment Donated</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @isset($data)
                                    @foreach($data as $data)
                                    <tr>
                                        <td>{{$data->names}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->phonenumber}}</td>
                                        <td>{{$data->eqname}}</td>
                                        <td>{{$data->updated_at}}</td>
                                    </tr>
                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>

        </div>
    </div>
    @include('admin.footer')
    <script>
    function createPDF() {
        var sTable = document.getElementById('record').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Ticket Details</title>'); // <title> FOR PDF HEADER.
        win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable); // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); // CLOSE THE CURRENT WINDOW.

        win.print(); // PRINT THE CONTENTS.

    }
    </script>
    @else
    <?php 
    return redirect('/loginn');

?>
    @endif