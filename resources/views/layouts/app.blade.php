<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
    /* Pastikan body memiliki padding untuk navbar */
    body {
        padding-top: 70px; /* Sesuaikan tinggi navbar */
    }

    /* Styling Sidebar */
    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        background: #343a40;
        color: white;
        padding-top: 20px;
        overflow-y: auto;
        z-index: 1040; /* Lebih tinggi dari navbar */
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

    /* Navbar hanya mengisi area setelah sidebar */
    .navbar {
        position: fixed;
        top: 0;
        left: 250px; /* Mulai setelah sidebar */
        width: calc(100% - 250px); /* Sisakan ruang untuk sidebar */
        z-index: 1030;
    }

    /* Pastikan konten memiliki margin agar tidak tertumpuk */
    .content {
        margin-left: 250px;
        padding: 20px;
        width: calc(100% - 250px);
        min-height: 100vh;
    }
</style>

</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door-fill"></i> Dashboard
        </a>
        <a href="{{ route('projects.index') }}" class="{{ request()->is('projects*') ? 'active' : '' }}">
            <i class="bi bi-folder-fill"></i> Projects
        </a>
    </div>

    <!-- Main Content -->
    <div class="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <!-- <a class="navbar-brand fw-bold" href="#">Project Management</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">        
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i> Notifikasi
                        <span class="badge bg-danger">{{ count($upcomingProjects) + count($upcomingTasks) }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                        @if(count($upcomingProjects) > 0)
                            <li><h6 class="dropdown-header">Proyek Mendekati Deadline</h6></li>
                            @foreach($upcomingProjects as $project)
                                <li><a class="dropdown-item text-danger" href="{{ route('projects.show', $project) }}">
                                    <i class="bi bi-exclamation-circle"></i> {{ $project->name }} ({{ $project->due_date }})
                                </a></li>
                            @endforeach
                        @endif
                        @if(count($upcomingTasks) > 0)
                            <li><h6 class="dropdown-header">Tugas Mendekati Deadline</h6></li>
                            @foreach($upcomingTasks as $task)
                                <li><a class="dropdown-item text-warning" href="#">
                                    <i class="bi bi-clock"></i> {{ $task->name }} ({{ $task->due_date }})
                                </a></li>
                            @endforeach
                        @endif
                        @if(count($upcomingProjects) == 0 && count($upcomingTasks) == 0)
                            <li><a class="dropdown-item text-muted text-center">Tidak ada notifikasi</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>



        <div class="container mt-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
