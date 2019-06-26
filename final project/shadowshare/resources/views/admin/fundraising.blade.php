@if(session()->has('status2'))
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shadowshare - Dashboard</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
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
                <form role="form" action="/save" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">

                        <div class="col-md-6" style="margin-left: 10%;margin-top: 5%;">

                            <div class="">
                                <label class="h3">Add Event</label>
                            </div>
                            <div class="right">
                                @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                            </div>





                            <div class="form-group">
                                <label class="loginFormElement">Title</label>
                                <input class="form-control" id="productname" type="text" name="casetitle"
                                    pattern="[a-zA-Z0-9][a-zA-Z0-9# ]+[a-zA-Z0-9_-#]$" required>
                            </div>
                            <div id="qoption">
                                <div class="form-group">
                                    <label for="productprice" class="loginFormElement">Description</label>
                                    <div class="card-body">
                                        <div class="pt-3">
                                            <textarea class="form-control" name="discription" id="test" rows=" 6"
                                                pattern="^[a-zA-Z0-9][a-zA-Z0-9.,-_#\r\n ]+$" required></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="productprice" class="loginFormElement">Image</label>
                                    <div class="pt-3">
                                        <img id="ima" src="" class="avatar img-circle img-thumbnail" alt="avatar">
                                        <h6>Upload a different photo...</h6>
                                        <input type="file" name="image" id="file" class="text-center file-upload"
                                            style="width:70%;" onchange=" readURL(this);" accept=".jpg,.jpeg,.png"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="productprice" class="loginFormElement">Amount Required</label>
                                    <input class="form-control" id="productprice" type="number" name="amount"
                                        pattern="^[1-9][0-9]+$" required>
                                </div>
                                <div class="form-group">
                                    <label for="productprice" class="loginFormElement">City</label>
                                    <input class="form-control" id="productprice" type="text" name="city"
                                        pattern="[a-zA-Z0-9][a-zA-Z0-9# ]+[a-zA-Z0-9]$" required>
                                </div>
                                <div class=" form-group">
                                    <label for="productprice" class="loginFormElement">Location Address</label>
                                    <div class="card-body">
                                        <div class="pt-3">
                                            <textarea class="form-control" name="address"
                                                pattern="^[a-zA-Z0-9][a-zA-Z0-9.,\r\n ]+$" id="" rows=" 6"
                                                required></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="productprice" class="loginFormElement">Account Details</label>
                                    <div class="card-body">
                                        <div class="pt-3">
                                            <textarea class="form-control" name="account" pattern="^[a-zA-Z0-9]" id=""
                                                rows=" 6" required></textarea>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div>
                                <input type="submit" id="loginSubmit" class="btn btn-success loginFormElement "
                                    style="margin-top:5%;" value=" Add Fund Event"> </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#ima')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

@include('admin.footer')

@else
<?php 
    return redirect('/loginn');

?>
@endif