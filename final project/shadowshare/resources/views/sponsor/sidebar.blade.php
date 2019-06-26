@if(session()->has('sponsor'))
<!-- Sidebar -->


<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="/sponsorprofile">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Profile</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="/needydetails">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>View Beneficiary</span>
        </a>
    </li>


    <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manage Equipments</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">#</h6>
            <a class="dropdown-item" href="/sadditem">Add Equipment</a>
            <a class="dropdown-item" href="/viewitemlist">View/Edit Equipment</a>
            <!-- <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Other Pages:</h6>
                <a class="dropdown-item" href="404.html">404 Page</a>
                <a class="dropdown-item" href="blank.html">Blank Page</a> 
    </div>
    </li> -->
    <li class="nav-item active">
        <a class="nav-link" href="/approvedfundcase">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Approved Requests</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="/spdonations">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Donated Fund</span>
        </a>
    </li>

</ul>

@else
<?php 
        return redirect('/loginn');
    
    ?>
@endif