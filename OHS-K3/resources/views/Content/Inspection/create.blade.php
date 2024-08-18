<x-app-layout>
    <div class="container mt-4 p-4" style="background-color: #f8f9fa; border-radius: 8px;">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Tambah Inspeksi Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('inspections.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Elemen Video untuk Capture Gambar -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Capture Temuan </label>
                        <div>
                            <video id="video" width="100%" height="100%" autoplay></video>
                        </div>
                        <button type="button" class="btn btn-secondary mt-2" id="capture">Capture</button>
                        <input type="hidden" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Preview Gambar yang Diambil -->
                    <div class="mb-3">
                        <canvas id="canvas" style="display: none;"></canvas>
                        <img id="photo" class="img-fluid" style="display: none;" alt="Hasil Capture">
                    </div>

                    <div class="mb-3">
                        <label for="plant" class="form-label">Plant</label>
                        <select class="form-control @error('plant') is-invalid @enderror" id="plant" name="plant" required>
                            <option value="">Pilih Plant</option>
                            <option value="plant 2/3" {{ old('plant') == 'plant 2/3' ? 'selected' : '' }}>Plant 2/3</option>
                            <option value="plant 4" {{ old('plant') == 'plant 4' ? 'selected' : '' }}>Plant 4</option>
                            <option value="plant 5" {{ old('plant') == 'plant 5' ? 'selected' : '' }}>Plant 5</option>
                            <option value="power plant" {{ old('plant') == 'power plant' ? 'selected' : '' }}>Power Plant</option>
                            <option value="head office" {{ old('plant') == 'head office' ? 'selected' : '' }}>Head Office</option>
                            <option value="tambang" {{ old('plant') == 'tambang' ? 'selected' : '' }}>Tambang</option>
                        </select>
                        @error('plant')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="area" class="form-label">Area</label>
                        <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ old('area') }}" required>
                        @error('area')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sub_area" class="form-label">Sub Area</label>
                        <input type="text" class="form-control @error('sub_area') is-invalid @enderror" id="sub_area" name="sub_area" value="{{ old('sub_area') }}" required>
                        @error('sub_area')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">Pilih Category</option>
                            <option value="Positive" {{ old('category') == 'Positive' ? 'selected' : '' }}>Positive</option>
                            <option value="Negative" {{ old('category') == 'Negative' ? 'selected' : '' }}>Negative</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="Open" {{ old('status') == 'Open' ? 'selected' : '' }}>Open</option>
                            <option value="Close" {{ old('status') == 'Close' ? 'selected' : '' }}>Close</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="condition" class="form-label">Condition</label>
                        <textarea class="form-control @error('condition') is-invalid @enderror" id="condition" name="condition" rows="3" required>{{ old('condition') }}</textarea>
                        @error('condition')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="recommendation" class="form-label">Recommendation</label>
                        <textarea class="form-control @error('recommendation') is-invalid @enderror" id="recommendation" name="recommendation" rows="3" required>{{ old('recommendation') }}</textarea>
                        @error('recommendation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inspection_date" class="form-label">Inspection Date</label>
                        <input type="date" class="form-control @error('inspection_date') is-invalid @enderror" id="inspection_date" name="inspection_date" value="{{ old('inspection_date') }}" required>
                        @error('inspection_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="reporten" class="form-label">Reporter</label>
                        <input type="text" class="form-control" id="reporten" name="reporten" value="{{ auth()->user()->username }}" disabled>
                        <input type="hidden" name="reporten" value="{{ auth()->user()->username }}">
                        @error('reporten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ route('inspections.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Akses kamera perangkat
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const photo = document.getElementById('photo');
        const captureButton = document.getElementById('capture');
        const imageData = document.getElementById('image');

        let currentStream;

        async function startCamera() {
            try {
                // Hentikan stream sebelumnya jika ada
                if (currentStream) {
                    let tracks = currentStream.getTracks();
                    tracks.forEach(track => track.stop());
                }

                // Akses kamera perangkat, pilih kamera belakang jika tersedia
                const stream = await navigator.mediaDevices.enumerateDevices();
                const videoDevices = stream.filter(device => device.kind === 'videoinput');
                const backCamera = videoDevices.find(device => device.label.toLowerCase().includes('back')) || videoDevices[0];

                currentStream = await navigator.mediaDevices.getUserMedia({
                    video: { deviceId: backCamera.deviceId }
                });
                video.srcObject = currentStream;
                video.play();
            } catch (err) {
                console.log("Error: " + err);
            }
        }

        startCamera();

        // Event listener untuk menangkap gambar
        captureButton.addEventListener('click', function() {
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            
            // Tampilkan hasil capture
            const dataURL = canvas.toDataURL('image/png');
            photo.setAttribute('src', dataURL);
            photo.style.display = 'block';
            imageData.value = dataURL;
        });
    </script>

</x-app-layout>
