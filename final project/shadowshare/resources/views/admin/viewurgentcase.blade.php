@if(session()->has('status2'))
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SS Admin - Dashboard</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
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
                        Urgent case Data Table </div>
                    <div class="card-body">
                        <button type="submit" style="margin-top:0%;color:blue;;margin-left:90%;"
                            class="btn btn-success-outline right" onclick="createPDF()">Download</button>
                        <div class="table-responsive" id="record">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>


                                    <tr>
                                        <th>Casetitle</th>
                                        <th>Description</th>
                                        <th>Account Number </th>

                                        <th>Location </th>

                                        <th>Amount Required</th>
                                        <th>Amount Achieved</th>
                                        <th>Date of creation</th>
                                        <th>Edit/Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($data)
                                    @foreach($data as $a)

                                    <tr id="row{{$a->fid}}">
                                        <td id="option1{{$a->fid}}">{{$a->casetitle}}</td>
                                        <td id="option2{{$a->fid}}">{{$a->discription}}</td>
                                        <td id="option3{{$a->fid}}">{{$a->account}}</td>
                                        <td id="option4{{$a->fid}}">{{$a->address}}</td>
                                        <td>{{$a->amount}}</td>
                                        <td>{{$a->amt}}</td>
                                        <td>{{$a->created_at}}</td>
                                        <td><input type="button" class="btn btn-outline-primary ml-3" name="edit"
                                                id="edit{{$a->fid}}" value="Edit" onclick="edit('{{$a->fid}}')"><br><br>
                                            <input type="button" class="btn btn-outline-primary ml-3" name="save"
                                                id="save{{$a->fid}}" value="save" style="display:none;"
                                                onclick="save_row('{{$a->fid}}')">
                                            <!-- <input type="button" class="btn btn-outline-primary ml-3" name="save"
                                                id="save{{$a->fid}}" value="Remove" onclick="delete_row('{{$a->fid}}')"> -->
                                            @if($a->status == 1)
                                            <a class="btn btn-outline-primary ml-3"
                                                href="{{ url('updatestatus/'.$a->fid)}}">Block</a>
                                        </td>
                                        @else
                                        <a class="btn btn-outline-primary ml-3"
                                            href="{{ url('updatestatus/'.$a->fid)}}">UnBlock</a></td>
                                        @endif

                                    </tr>

                                    @endforeach

                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('admin.footer')
    <script src="admin/js/jquery-3.3.1.js"></script>
    <script src="admin/js/casedata.js"></script>
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