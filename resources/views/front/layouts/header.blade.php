<nav class="navbar navbar-expand-lg navbar-light" style="background: #212429;">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/ahla/logo.png') }}" alt="logo" style="height: 50px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="margin-left: 50px;">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('salon') }}">Salon <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('about') }}">About <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('contact') }}">Contact us <span class="sr-only"></span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">

                    @if(Auth::check() == true)
                    {{-- <a class="btn btn-outline-success my-2 my-sm-0"  style="background: #EB996E !important;">Wallet</a> --}}
                    <div class="dropdown">
                        <button class="btn btn-outline-success my-2 my-sm-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="background: #EB996E !important;" aria-haspopup="true" aria-expanded="false">
                            Account
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Order History</a>
                            <a class="dropdown-item" href="#">Change Password</a>
                            <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                        </div>
                    </div>
                    @else
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('user.login') }}" style="background: #EB996E !important;">Sign In</a>
                    @endif
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('cart') }}" style="margin-left: 10px;">Cart</a>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('admin.dashboard') }}" style="margin-left: 10px;">admin</a>
                </form>
            </div>
        </div>
    </div>
</nav>
