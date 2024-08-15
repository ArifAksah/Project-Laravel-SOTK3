<x-app-layout>
    <div class="container py-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Permintaan persetujuan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Asal Perusahaan</th>
                            <th scope="col">Requested At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->asal_perusahaan }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                            @if ($user->is_approved == 1)
                                <span class="badge badge-opacity-success">Approved</span>
                            @elseif ($user->is_approved == 3)
                                <span class="badge badge-opacity-danger">Rejected</span>
                            @else
                                <span class="badge badge-opacity-warning">Pending</span>
                            @endif
                            </td>
                            <td>
                                <form action="{{ route('admin_approvals.approve', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="{{ route('admin_approvals.reject', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
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
