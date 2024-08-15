<!-- resources/views/inspections/index.blade.php -->
<x-app-layout>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Daftar Inspeksi</h1>
            <a href="{{ route('inspections.create') }}" class="btn btn-primary">Tambah Inspeksi Baru</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Data Inspeksi</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Plant</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Inspection Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inspections as $inspection)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $inspection->plant }}</td>
                                    <td>{{ $inspection->category }}</td>
                                    <td>{{ $inspection->status }}</td>
                                    <td>{{ $inspection->inspection_date }}</td>
                                    <td>
                                        <a href="{{ route('inspections.show', $inspection->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('inspections.edit', $inspection->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('inspections.destroy', $inspection->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
