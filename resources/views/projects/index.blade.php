@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-4 text-center">Management Proyek</h3>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Proyek
            </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table id="projectsTable" class="table table-hover table-striped py-3 table-bordered border-radius">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Proyek</th>
                        <th>Status</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->name }}</td>
                            <td>
                                <span class="badge bg-{{ $project->status == 'active' ? 'success' : ($project->status == 'completed' ? 'primary' : 'danger') }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </td>
                            <td>{{ $project->start_date ?? '-' }}</td>
                            <td>{{ $project->due_date ?? '-' }}</td>
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
    </div>
</div>

<!-- Tambahkan jQuery dan DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#projectsTable').DataTable({
            "paging": true,       // Aktifkan Pagination
            "ordering": true,     // Aktifkan Sorting
            "searching": true,    // Aktifkan Search
            "lengthMenu": [5, 10, 25, 50], // Opsi jumlah data per halaman
            "language": {
                "lengthMenu": "Show _MENU_",
                "zeroRecords": "Tidak ada proyek ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak ada data tersedia",
                "search": "Cari:",
                "paginate": {
                    "next": "Prev",
                    "previous": "Next"
                }
            },
            "columnDefs": [
                { "orderable": false, "targets": 4 } // Nonaktifkan sorting di kolom aksi
            ]
        });
    });
</script>
@endsection
