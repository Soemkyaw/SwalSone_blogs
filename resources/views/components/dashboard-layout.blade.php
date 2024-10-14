<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Bootstrap 5 Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding-top: 1rem;
        }

        .sidebar a {
            padding: 10px;
            text-align: left;
            font-size: 18px;
            color: white;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            padding: 20px;
        }

        @media (min-width: 768px) {
            .sidebar {
                position: fixed;
                width: 250px;
            }

            .main-content {
                margin-left: 250px;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar d-none d-md-block">
        <a href="/" class="text-white text-center fs-4"><span class=" text-danger">Swal Sone</span> Blogs</a>
        <a href="/admin/dashboard">Home</a>
        <a href="/admin/blog/list">Blog List</a>
        <a href="/admin/user/list">User List</a>
        <a href="/admin/category/list">Category List</a>
    </div>

    <!-- Navbar for small screens -->
    <nav class="navbar navbar-dark bg-dark d-md-none ps-3">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/dashboard">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/blog/list">Blog List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/user/list">User List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/category/list">Category List</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content">
        <!-- Navbar for large screens -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Admin Panel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1"
                    aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/admin/dashboard">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{ $slot }}

    </div>

    <x-alerts></x-alerts>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
