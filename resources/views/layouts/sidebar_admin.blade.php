<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('uploads/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a class="js-arrow " href="#">
                        <i class="fas fa-tachometer-alt "></i>Dashboard</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-chart-bar"></i>Order</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-table"></i>Tables</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ url('products')}}">Products</a>
                        </li>
                        <li>
                            <a href="{{url('brands')}}">Brands</a>
                        </li>
                        <li>
                            <a href="{{url('customers')}}">Customers</a>
                        </li>
                        <li>
                            <a href="{{url('product_types')}}">Product Type</a>
                        </li>
                    </ul>
                </li>
              <!-- <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>Forms</a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </nav>
    </div>
</aside>
