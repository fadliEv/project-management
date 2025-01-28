<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding-top: 20px;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .sidebar a.active {
            background: #007bff;
            font-weight: bold;
        }

        /* Content Area */
        .content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 20px;
            width: 100%;
            background: #f8f9fa;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
        }

        /* Footer */
        .footer {
            background: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: calc(100% - 250px);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
            <i class="bi bi-house-door-fill"></i> Dashboard
        </a>
        <a href="{{ route('projects.index') }}" class="{{ request()->is('projects*') ? 'active' : '' }}">
            <i class="bi bi-folder-fill"></i> Projects
        </a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <!-- <nav class="navbar navbar-expand-lg navbar-light px-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Project Management</a>
            </div>
        </nav> -->

        <div class="container mt-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
