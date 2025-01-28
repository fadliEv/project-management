@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="fw-bold">Projects Management</h4>
            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Proyek
            </a>
        </div>
    </div>

    @if ($projects->count() > 0)
        <div class="table-responsive">
            <table class="table table-light table-bordered table-hover align-middle">
                <thead class="">
                    <tr>
                        <th>Nama Proyek</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td class="fw-bold">{{ $project->name }}</td>
                            <td>{{ Str::limit($project->description, 50) }}</td>
                            <td>{{ $project->start_date ?? '-' }}</td>
                            <td>{{ $project->due_date ?? '-' }}</td>
                            <td>
                                @if($project->status == 'active')
                                    <span class="badge bg-success">Aktif</span>
                                @elseif($project->status == 'completed')
                                    <span class="badge bg-primary">Selesai</span>
                                @else
                                    <span class="badge bg-danger">Dibatalkan</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-warning text-white">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mt-1">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="bi bi-exclamation-circle"></i> Tidak ada proyek yang ditemukan.
        </div>
    @endif
</div>
@endsection
