<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm py-2">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="/"><span class=" text-danger">SwalSone</span> Blogs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="/#blogs">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-disabled="true" href="/contact-us">Contact us</a>
                </li>
                @auth
                    @can('is_admin')
                        <a href="/admin/dashboard" class=" nav-link fs-5">Dashboard</a>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                                @if (auth()->user()->avatar)
                                    <img src="{{ asset('storage/'.auth()->user()->avatar) }}" width="50px" height="50px" class="object-fit-cover rounded-circle">
                                @else
                                    <img src="{{ asset('images/free_logo.png') }}" width="50px" class=" img-thumbnail">
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/user/{{ auth()->user()->slug }}/profile">Profile</a></li>
                                <li><a class="dropdown-item" href="/{{ auth()->user()->slug }}/blogs">Blogs</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-link text-decoration-none text-danger" value="Logout">
                                </form>
                            </ul>
                        </li>
                    @endcan
                @else
                    <li class="nav-item">
                        <a href="/register" class="nav-link fs-5" aria-disabled="true">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
