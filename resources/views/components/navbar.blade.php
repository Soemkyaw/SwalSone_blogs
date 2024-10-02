<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm py-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                        {{-- <li class="nav-item">
                            <a href="/logout" class="nav-link text-danger" aria-disabled="true">logout</a>
                        </li> --}}
                        <form action="/logout" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-link text-decoration-none text-danger" value="Logout">
                        </form>
                    @else
                        <li class="nav-item">
                            <a href="/register" class="nav-link " aria-disabled="true">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
</nav>
