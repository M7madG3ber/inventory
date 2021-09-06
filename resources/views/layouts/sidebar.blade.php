<ul v-show=" ( $route.name == 'login' || $route.name == 'register' || $route.name == 'forget' ) ? false : true"
    class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center">

        <div class="sidebar-brand-icon">
            <img src="{{ asset('backend/img/logo/logo2.png') }}">
        </div>

        <topbarname></topbarname>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <router-link class="nav-link" to="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </router-link>
    </li>

    <hr class="sidebar-divider">

    <!-- Start Employees -->
    <li class="nav-item">
        <a :class="['nav-link' , ( $route.name != 'editemployee' && $route.name != 'createemployee' && $route.name != 'employees' ) ? 'collapsed' : '']"
            href="#" data-toggle="collapse" data-target="#collapseEmployees"
            :aria-expanded="( $route.name != 'editemployee' && $route.name != 'createemployee' && $route.name != 'employees' ) ? 'false' : 'true'"
            aria-controls="collapseEmployees">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Employees</span>
        </a>
        <div id="collapseEmployees"
            :class="['collapse' , ( $route.name != 'editemployee' && $route.name != 'createemployee' && $route.name != 'employees' ) ? '' : 'show']"
            aria-labelledby="headingEmployees" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <router-link :class="['collapse-item', $route.name == 'createemployee' ? 'active' : '']"
                    to="/create-employee">Add Employee</router-link>

                <router-link :class="['collapse-item', $route.name == 'employees' ? 'active' : '']" to="/employees">All
                    Employees</router-link>

            </div>
        </div>
    </li>
    <!-- End Employees -->

</ul>