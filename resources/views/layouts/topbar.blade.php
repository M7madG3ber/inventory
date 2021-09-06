<nav v-show=" ( $route.name == 'login' || $route.name == 'register' || $route.name == 'forget' ) ? false : true"
    class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">

    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset('backend/img/boy.png') }}"
                    style="max-width: 60px">

                <!-- Logout -->
                <router-link to="/logout" class="ml-2 d-none d-lg-inline text-white small">Logout</router-link>
                <!-- Logout -->

            </a>

        </li>
    </ul>
</nav>