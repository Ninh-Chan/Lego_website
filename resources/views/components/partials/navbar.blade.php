<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #search-box{
        height: 50px;
        width: 450px;
        font-size: 21px;
        padding: 25px;
        outline: none;
        border: none;
        border-radius: 5px;
        background: #e9e6e6;
        margin-right: 20px;
        box-shadow: 5px 5px 5px #d3d0d0, inset 5px 5px 10px #fff;
    }
    button{
        position: absolute;
        outline: none;
        border: none;
        font-size: 20px;
    }
</style>
<nav class="navbar navbar-expand-lg bg-warning sticky-top navbar-light p-3 shadow-sm" style="height: 100px">
    <div class="container">
        <a class="navbar-brand" href="{{url('/') }}">
            <img src="{{asset('uploads/logo.png')}}" alt="logo" width="170px" height="100px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
            <div class="input-group">
                <input type="search" name="search" placeholder="search.." id="search-box">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-lg-block">
                <div class="input-group">
                    <input type="search" name="search" placeholder="Search.." id="search-box">
                </div>
            </div>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase active" {{ request()->routeIs('home') ? 'active' : ''}}
                    aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#">Brands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#">Product Types</a>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#"><i class="fa-solid fa-cart-shopping me-1"></i> Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#"><i class="fa-solid fa-circle-user me-1"></i> Account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
