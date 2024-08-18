<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Karyawan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('karyawan.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nama Lengkap</label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="asal_perusahaan" class="form-label">Asal Perusahaan</label>
                                    <input type="text" id="asal_perusahaan" name="asal_perusahaan" class="form-control" value="PT. Semen Tonasa" readonly>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" id="role" name="role" class="form-control" value="user">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
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
