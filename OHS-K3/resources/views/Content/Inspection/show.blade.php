<x-app-layout>
    <div class="container mt-4 p-4" style="background-color: #f8f9fa; border-radius: 8px;">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Detail Inspeksi</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label"><strong>Plant:</strong></label>
                    <p>{{ $inspection->plant }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Area:</strong></label>
                    <p>{{ $inspection->area }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Sub Area:</strong></label>
                    <p>{{ $inspection->sub_area }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Category:</strong></label>
                    <p>{{ $inspection->category }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Status:</strong></label>
                    <p>{{ $inspection->status }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Condition:</strong></label>
                    <p>{{ $inspection->condition }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Description:</strong></label>
                    <p>{{ $inspection->description }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Recommendation:</strong></label>
                    <p>{{ $inspection->recommendation }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Inspection Date:</strong></label>
                    <p>{{ $inspection->inspection_date }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Reporten:</strong></label>
                    <p>{{ $inspection->reporten }}</p>
                </div>

                <!-- Tampilkan Gambar Jika Ada -->
                @if($inspection->image)
                    <div class="mb-3">
                        <label class="form-label"><strong>Gambar:</strong></label>
                        <div>
                            <img src="{{ asset('storage/' . $inspection->image) }}" alt="Gambar Inspeksi" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                @endif

                <div class="d-flex justify-content-end">
                    <a href="{{ route('inspections.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <a href="{{ route('inspections.edit', $inspection->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
