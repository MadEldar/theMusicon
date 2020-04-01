<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('admin/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">David Grey. H</span>
                    <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/administrator')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
               aria-controls="general-pages">
                <span class="menu-title">Table</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{url('/administrator/artist')}}"> Artist </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/administrator/albums')}}"> Albums </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/administrator/song')}}"> Song </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/samples/error-404.html"> Page 4 </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/samples/error-500.html"> Page 5 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
        <div class="mt-4">
          <div class="border-bottom">
            <p class="text-secondary">Categories</p>
          </div>
          <ul class="gradient-bullet-list mt-4">
            <li>Free</li>
            <li>Pro</li>
          </ul>
        </div>
      </span>
        </li>
    </ul>
</nav>
