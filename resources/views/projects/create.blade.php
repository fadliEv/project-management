@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Tambah Proyek</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Proyek</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="due_date" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date') }}">
                                @error('due_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                                <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Inputan Task -->
                        <div class="mb-3">
                            <label for="tasks" class="form-label">Tugas</label>
                            <div id="tasks-container">
                                <div class="task-item d-flex mb-2">
                                    <input type="text" name="tasks[][name]" class="form-control me-2" placeholder="Nama Tugas">
                                    <button type="button" class="btn btn-danger remove-task">&times;</button>
                                </div>
                            </div>
                            <button type="button" id="add-task" class="btn btn-secondary">Tambah Tugas</button>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-task').addEventListener('click', function() {
        const taskContainer = document.getElementById('tasks-container');
        const taskItem = document.createElement('div');
        taskItem.classList.add('task-item', 'd-flex', 'mb-2');
        taskItem.innerHTML = `
            <input type="text" name="tasks[][name]" class="form-control me-2" placeholder="Nama Tugas">
            <button type="button" class="btn btn-danger remove-task">&times;</button>
        `;
        taskContainer.appendChild(taskItem);
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-task')) {
            event.target.parentElement.remove();
        }
    });
</script>
@endsection
