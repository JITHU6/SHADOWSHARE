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
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body id="page-top">

    @include('admin.nav')

    <div id="wrapper">
        @include('admin.sidebar')
        <div id="content-wrapper">
            <div class="container-fluid">
                <form class="form-inline pl-5" style="margin-top:10%;" action="/addcat" method="POST">
                    @csrf
                    <div class="form-group mb-2 ">


                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2"
                            value="Category Name">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">

                        <input type="text" class="form-control" id="inputPassword2" placeholder="" name="cname"
                            pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" style="text-transform:capitalize;"
                            title=" enter valid category name" required>
                    </div>
                    <button type=" submit" class="btn btn-primary mb-2">Add Category</button>
                </form>


                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Category List</div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>


                                    </tr>
                                </tfoot>
                                <tbody>
                                    @isset($data)
                                    <input type="hidden" value="{{$count=1}}">

                                    @foreach ($data as $user)


                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$user->categoryname}}</td>
                                        <td class="align-content-center">

                                            <a class="btn btn-outline-primary ml-3"
                                                href="{{ url('deletecategory/'.$user->category_id)}}">Delete</a>
                                            @if($user->status == 1)
                                            <a class="btn btn-outline-primary ml-3"
                                                href="{{ url('updatecategory/'.$user->category_id)}}">Block</a> </td>
                                        @else
                                        <a class="btn btn-outline-primary ml-3"
                                            href="{{ url('updatecategory/'.$user->category_id)}}">UnBlock</a> </td>
                                        @endif
                                    </tr>

                                    <input type="hidden" value="{{$count=$count+1}}">
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
    <script src="admin/js/jquery-3.3.1.min.js"> </script>

    @else
    <?php 
    return redirect('/loginn');

?>
    @endif