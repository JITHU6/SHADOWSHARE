@if(session()->has('seller'))
<!-- Sidebar -->


<ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/sprofile">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/sadditem">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Add Equipment</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/viewitemlist">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>View/Edit Equipment</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/sprofile">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Beneficiary</span>
            </a>
        </li>
        {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Beneficiary</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">#</h6>
                <a class="dropdown-item" href="/viewsponser">Sponser</a>
                <a class="dropdown-item" href="/viewneedy">Needy</a>
                <!-- <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Other Pages:</h6>
                <a class="dropdown-item" href="404.html">404 Page</a>
                <a class="dropdown-item" href="blank.html">Blank Page</a> -->
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Approve Seller</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/addcategory">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Add Category</span></a>
        </li>
        
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Questions</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">#</h6>
                    <a class="dropdown-item" href="/addquestion">Add Questions</a>
                    <a class="dropdown-item" href="/listquestion">View or Edit Question</a>
                    <!-- <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Other Pages:</h6>
                    <a class="dropdown-item" href="404.html">404 Page</a>
                    <a class="dropdown-item" href="blank.html">Blank Page</a> -->
                </div>
            </li>
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span></span></a>
        </li> --}}
    </ul>

    @else
    <?php 
        return redirect('/loginn');
    
    ?>
    @endif