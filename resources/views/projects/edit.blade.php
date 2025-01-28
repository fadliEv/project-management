@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Proyek</h4>
                    <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('projects.update', $project) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Proyek</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $project->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date) }}">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="due_date" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date', $project->due_date) }}">
                                @error('due_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status Proyek</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Selesai</option>
                                <option value="canceled" {{ old('status', $project->status) == 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <h5><i class="bi bi-list-task"></i> Daftar Tugas</h5>
                        @foreach ($project->tasks as $task)
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-6">
                                    <label for="task-{{ $task->id }}" class="form-label">Nama Tugas</label>
                                    <input type="text" class="form-control" id="task-{{ $task->id }}" name="tasks[{{ $task->id }}][name]" value="{{ $task->name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="task-status-{{ $task->id }}" class="form-label">Status Tugas</label>
                                    <select class="form-select" id="task-status-{{ $task->id }}" name="tasks[{{ $task->id }}][status]">
                                        <option value="not_started" {{ $task->status == 'not_started' ? 'selected' : '' }}>Belum Dimulai</option>
                                        <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>Dalam Proses</option>
                                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
