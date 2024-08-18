<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Karyawan</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Username:</strong> {{ $user->username }}
                            </div>
                            <div class="mb-3">
                                <strong>Email:</strong> {{ $user->email }}
                            </div>
                            <div class="mb-3">
                                <strong>Asal Perusahaan:</strong> {{ $user->asal_perusahaan }}
                            </div>
                            <div class="mb-3">
                                <strong>Role:</strong> {{ $user->role }}
                            </div>
                            <div class="mb-3">
                                <strong>Status:</strong> {{ $user->is_approved ? 'Approved' : 'Not Approved' }}
                            </div>
                            <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
