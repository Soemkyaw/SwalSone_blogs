<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm py-2">
        <div class="container">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#blogs">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-disabled="true">About us</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                                <img src="{{ asset('images/free_logo.png') }}" width="50px" class=" img-thumbnail">
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/user/{{ auth()->user()->slug }}/profile">Profile</a></li>
                                <li><a class="dropdown-item" href="#scrollspyHeading4">Blogs</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <form action="/logout" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-link text-decoration-none text-danger" value="Logout">
                        </form>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/register" class="nav-link " aria-disabled="true">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
</nav>
