<x-app-layout>
    <div class="container mt-4 p-4" style="background-color: #f8f9fa; border-radius: 8px;">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Edit Inspeksi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('inspections.update', $inspection->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Input Gambar -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Pilih Gambar (optional)</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Preview Gambar Lama -->
                    @if($inspection->image)
                        <div class="mb-3">
                            <label for="current_image" class="form-label">Gambar Saat Ini</label>
                            <div>
                                <img src="{{ asset('storage/' . $inspection->image) }}" alt="Gambar Inspeksi" style="max-width: 100%; height: auto;">
                            </div>
                        </div>
                    @endif

                    <!-- Input Plant -->
                    <div class="mb-3">
                        <label for="plant" class="form-label">Plant</label>
                        <select class="form-select @error('plant') is-invalid @enderror" id="plant" name="plant" required>
                            <option value="Plant 2/3" {{ old('plant', $inspection->plant) == 'Plant 2/3' ? 'selected' : '' }}>Plant 2/3</option>
                            <option value="Plant 4" {{ old('plant', $inspection->plant) == 'Plant 4' ? 'selected' : '' }}>Plant 4</option>
                            <option value="Plant 5" {{ old('plant', $inspection->plant) == 'Plant 5' ? 'selected' : '' }}>Plant 5</option>
                            <option value="Power Plant" {{ old('plant', $inspection->plant) == 'Power Plant' ? 'selected' : '' }}>Power Plant</option>
                            <option value="Head Office" {{ old('plant', $inspection->plant) == 'Head Office' ? 'selected' : '' }}>Head Office</option>
                            <option value="Tambang" {{ old('plant', $inspection->plant) == 'Tambang' ? 'selected' : '' }}>Tambang</option>
                        </select>
                        @error('plant')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Area -->
                    <div class="mb-3">
                        <label for="area" class="form-label">Area</label>
                        <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ old('area', $inspection->area) }}" required>
                        @error('area')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Sub Area -->
                    <div class="mb-3">
                        <label for="sub_area" class="form-label">Sub Area</label>
                        <input type="text" class="form-control @error('sub_area') is-invalid @enderror" id="sub_area" name="sub_area" value="{{ old('sub_area', $inspection->sub_area) }}" required>
                        @error('sub_area')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Category -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="Positive" {{ old('category', $inspection->category) == 'Positive' ? 'selected' : '' }}>Positive</option>
                            <option value="Negative" {{ old('category', $inspection->category) == 'Negative' ? 'selected' : '' }}>Negative</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="Open" {{ old('status', $inspection->status) == 'Open' ? 'selected' : '' }}>Open</option>
                            <option value="Close" {{ old('status', $inspection->status) == 'Close' ? 'selected' : '' }}>Close</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Condition -->
                    <div class="mb-3">
                        <label for="condition" class="form-label">Condition</label>
                        <textarea class="form-control @error('condition') is-invalid @enderror" id="condition" name="condition" rows="3" required>{{ old('condition', $inspection->condition) }}</textarea>
                        @error('condition')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $inspection->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Recommendation -->
                    <div class="mb-3">
                        <label for="recommendation" class="form-label">Recommendation</label>
                        <textarea class="form-control @error('recommendation') is-invalid @enderror" id="recommendation" name="recommendation" rows="3" required>{{ old('recommendation', $inspection->recommendation) }}</textarea>
                        @error('recommendation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Inspection Date -->
                    <div class="mb-3">
                        <label for="inspection_date" class="form-label">Inspection Date</label>
                        <input type="date" class="form-control @error('inspection_date') is-invalid @enderror" id="inspection_date" name="inspection_date" value="{{ old('inspection_date', $inspection->inspection_date) }}" required>
                        @error('inspection_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Reporten -->
                    <div class="mb-3">
                        <label for="reporten" class="form-label">Reporten</label>
                        <input type="text" class="form-control @error('reporten') is-invalid @enderror" id="reporten" name="reporten" value="{{ auth()->user()->username }}" disabled>
                        <input type="hidden" name="reporten" value="{{ auth()->user()->username }}">
                        @error('reporten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <a href="{{ route('inspections.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
