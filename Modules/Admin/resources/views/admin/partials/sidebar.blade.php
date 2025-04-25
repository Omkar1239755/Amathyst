<aside class="main-sidebar sidebar-dark-primary elevation-4"> 
    <a href="index.php" class="brand-link"> 
        <!-- <img src=""  class="brand-image img-circle elevation-3" >  -->
        <span class="brand-text"> Logo </span> 
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" >
                <li class="nav-item"> 
                    <a href="{{ route('dashboard') }}" class="nav-link "> 
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <li class="nav-item"> 
                    <a href="/admin/skill" class="nav-link "> 
                        <i class="nav-icon fas fa-user"></i>
                        <p> Skills </p>
                    </a>
                </li>

                 <li class="nav-item"> 
                    <a href="form.php" class="nav-link "> 
                        <i class="nav-icon fas fa-user"></i>
                        <p> Form </p>
                    </a>
                </li>
                <li class="nav-item"> 
                    <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                        <p> Elements <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="button.php" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                                <p>Button</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="modal.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                              <p> Modal </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="tagInputs.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                              <p> tag Inputs </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="addMore.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                              <p> Add More </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="chart.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                              <p> Charts </p>
                            </a> 
                        </li>
                         <li class="nav-item"> 
                            <a href="uploadImage.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                              <p> Upload Image </p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="fullCalendar.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                              <p> Full Calendar </p>
                            </a> 
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> 
                    <a href="/admin/logout" class="nav-link"> <i class="nav-icon fas fa-th"></i>
                        <p> Logout </p>
                    </a> 
                </li>
            </ul>
        </nav>
    </div>
</aside>