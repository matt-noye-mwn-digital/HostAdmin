<div class="bottomNavWrap">
    <nav>
        <li>
            <a href=""><i class="fas fa-cog"></i> Settings</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </nav>
</div>
