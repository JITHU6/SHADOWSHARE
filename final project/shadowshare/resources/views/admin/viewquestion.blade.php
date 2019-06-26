@if(session()->has('status2'))
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SS Admin - Dashboard</title>
    <script src="admin/js/jquery-3.3.1.min.js"></script>
    <script src="admin/js/question.js"></script>
    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body id="page-top">

    @include('admin.nav')

    <div id="wrapper">
        @include('admin.sidebar')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6" style="margin-left: 10%;margin-top: 5%;">
                        <form role="form" action="/listquestion" post="POST">
                            @csrf
                            <div class="">
                                <label class="h3">Update Questions</label>
                            </div>
                            <div class="right">
                                @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="mt-1">
                                    <select class="form-control" id="productSelect" name="category" required>

                                        <option>Select Category</option>
                                        @isset($data)
                                        @foreach($data as $category)
                                        <option value="{{$category->category_id}}">{{$category->categoryname}}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="ml-4">
                                    <button type="submit" id="loginSubmit" class="btn btn-success loginFormElement "
                                        style="margin-top:5%;">submit</button>
                                </div>
                            </div>


                    </div>
                    </form>


                </div>

                <div class="card mb-3 mt-4">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="card-body">
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!!
                                session('flash_message') !!}</em></div>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <button type="submit" style="margin-top:0%;color:blue;;margin-left:90%;"
                            class="btn btn-success-outline right" onclick="createPDF()">Download</button>
                        <div class="table-responsive" id="record">
                            <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Question</th>
                                        <th>Option1</th>
                                        <th>Option2</th>
                                        <th>Option3</th>
                                        <th>Option4</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>


                                    </tr>
                                </tfoot>
                                <tbody>

                                    @isset($quest)

                                    <input type="hidden" value="{{$count=1}}">
                                    @foreach ($quest as $user)


                                    <tr id="row{{$user->question_id}}">
                                        <td>{{$count}}</td>
                                        <td>{{$user->question}}</td>
                                        <td id="option1{{$user->question_id}}">{{$user->option_a}}</td>
                                        <td id="option2{{$user->question_id}}">{{$user->option_b}}</td>
                                        <td id="option3{{$user->question_id}}">{{$user->option_c}}</td>
                                        <td id="option4{{$user->question_id}}">{{$user->option_d}}</td>
                                        <td class="align-content-center">

                                            <input type="button" class="btn btn-outline-primary ml-3" name="edit"
                                                id="edit{{$user->question_id}}" value="Edit"
                                                onclick="edit_row('{{$user->question_id}}')"><br><br>
                                            <input type="button" class="btn btn-outline-primary ml-3" name="save"
                                                id="save{{$user->question_id}}" value="save"
                                                onclick="save_row('{{$user->question_id}}')"><br>
                                            <a class="btn btn-outline-primary ml-3"
                                                href="{{ url('qdelete/'.$user->question_id)}}">Remove</a>

                                        </td>
                                    </tr>
                                    <input type="hidden" value="{{$count=$count+1}}">
                                    @endforeach
                                    @endisset


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM
            </div>
        </div>


        </form>


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