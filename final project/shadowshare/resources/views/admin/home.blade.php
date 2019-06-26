@if(session()->has('status2'))
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shadow Share |Admin</title>

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
                                @include('admin.admincontent')
                
                </div>
                
        </div>
</div>
@include('admin.footer')
@else
<?php 
    return redirect('/loginn');

?>
@endif