<header class="header">
    <div class="header_content d-flex flex-row align-items-center justify-content-center">
        <div class="logo"><a href="#">Vietmix</a></div>
        <div class="log_reg">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li><a href="{{ route('user.login') }}">Login</a></li>
                <li><a href="#">Register</a></li>
            </ul>
        </div>
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="about.html">About us</a></li>
                <li><a href="music.html">Music</a></li>
                <li><a href="blog.html">News</a></li>
                <li><a href="contact.html">Contact</a></li>
                <form action="{{ route('search') }}" method="get" class="form-inline">
                    <li class="nav-item">
                        <input type="text" class="form-control" name="name" placeholder="Search for a song...">
                    </li>
                    <li class="nav-item">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="fa fa-search" aria-hidden="true"></i> Search
                        </button>
                    </li>
                </form>
                @if (Session::has('message'))
                    <div class="alert alert-info">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </ul>
        </nav>

    </div>
</header>
