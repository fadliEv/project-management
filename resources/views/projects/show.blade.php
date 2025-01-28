@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Detail Proyek : {{ $project->name }}</h4>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <h5><i class="bi bi-file-text"></i> Deskripsi</h5>
                        <p>{{ $project->description ?? 'Tidak ada deskripsi' }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <h5><i class="bi bi-calendar"></i> Tanggal Mulai</h5>
                            <p>{{ $project->start_date ?? '-' }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5><i class="bi bi-calendar-check"></i> Tanggal Selesai</h5>
                            <p>{{ $project->due_date ?? '-' }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5><i class="bi bi-info-circle"></i> Status</h5>
                            <span class="badge bg-{{ $project->status == 'active' ? 'success' : ($project->status == 'completed' ? 'primary' : 'danger') }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                    </div>

                    <hr>

                    <!-- Tabel Tugas -->
                    <h4><i class="bi bi-list-task"></i> Daftar Tugas</h4>
                    @if ($project->tasks->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tugas</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project->tasks as $index => $task)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $task->name }}</td>
                                            <td>
                                                <span class="badge bg-{{ $task->status == 'not_started' ? 'secondary' : ($task->status == 'in_progress' ? 'warning' : 'success') }}">
                                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-exclamation-circle"></i> Tidak ada tugas yang tersedia untuk proyek ini.
                        </div>
                    @endif

                    <hr>

                    <div class="text-center">
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Proyek
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
