<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Karyawan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('karyawan.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="asal_perusahaan" class="form-label">Asal Perusahaan</label>
                                    <input type="text" id="asal_perusahaan" name="asal_perusahaan" class="form-control" value="{{ $user->asal_perusahaan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" id="role" name="role" class="form-control" value="{{ $user->role }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="is_approved" class="form-label">Approved</label>
                                    <input type="checkbox" id="is_approved" name="is_approved" {{ $user->is_approved ? 'checked' : '' }}>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
