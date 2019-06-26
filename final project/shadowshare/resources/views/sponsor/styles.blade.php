@if(session()->has('sponsor'))
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shadowshare|Sponsor</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link rel="stylesheet" href="needy/css/fundlist.css">
    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="seller/css/itemlist.css">
    {{-- <link href="https://clientval.ml/cv-resources/1.9.3/css/clientval-style.css" rel="stylesheet"/>
<script src="https://clientval.ml/cv-resources/1.9.3/js/clientval-script.js" cv-key=API-KEY></script> --}}

</head>

<body id="page-top">
    @else
    <?php 
            return redirect('/loginn');
        
        ?>
    @endif