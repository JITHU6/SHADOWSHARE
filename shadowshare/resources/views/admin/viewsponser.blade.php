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
                                    Data Table Example</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>email</th>
                                                    <th>Phone</th>
                                                    <th>fund Donated</th>
                                                    <th>Equipment Donated</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>
                                                    <td>$170,750</td>
                                                </tr>
                        
                        
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
@else
<?php 
    return redirect('/loginn');

?>
@endif


