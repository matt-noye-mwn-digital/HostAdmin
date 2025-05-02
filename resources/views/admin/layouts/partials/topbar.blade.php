<header>
    <div class="topbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <a href="" class="brand d-none d-sm-block d-md-block d-lg-none d-xl-none">
                        @include('admin.layouts.partials.brand')
                    </a>
                    <button class="sidebarToggler">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <nav class="topbarRightNav">
                        <li class="dropdown notifDropdown">
                            <a class="dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="top">
                                    <div class="notifTitle">Notifications <span class="notifCount">10</span></div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown userDropdown">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ ucfirst(substr(Auth::user()->first_name, 0, 1)) }}{{ ucfirst(substr(Auth::user()->last_name, 0, 1)) }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="top">
                                    <div class="userName">
                                        {{ Auth::user()->full_name }}
                                    </div>
                                    <div class="userEmail">
                                        {{ Auth::user()->email }}
                                    </div>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fas fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fas fa-cog"></i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
