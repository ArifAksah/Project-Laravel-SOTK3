<x-app-layout>
    <div class="container mt-4 p-4" style="background-color: #f8f9fa; border-radius: 8px;">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Ringkasan Inspeksi</h4>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('summary.index') }}">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="plant" class="form-label">Plant</label>
                            <select name="plant" id="plant" class="form-control">
                                <option value="">-- Select Plant --</option>
                                <option value="Plant 2/3" {{ request('plant') == 'Plant 2/3' ? 'selected' : '' }}>Plant 2/3</option>
                                <option value="Plant 4" {{ request('plant') == 'Plant 4' ? 'selected' : '' }}>Plant 4</option>
                                <option value="Plant 5" {{ request('plant') == 'Plant 5' ? 'selected' : '' }}>Plant 5</option>
                                <option value="Power Plant" {{ request('plant') == 'Power Plant' ? 'selected' : '' }}>Power Plant</option>
                                <option value="Head Office" {{ request('plant') == 'Head Office' ? 'selected' : '' }}>Head Office</option>
                                <option value="Tambang" {{ request('plant') == 'Tambang' ? 'selected' : '' }}>Tambang</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="area" class="form-label">Area</label>
                            <input type="text" name="area" id="area" class="form-control" value="{{ request('area') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>

                <hr>

                @if($inspections->isEmpty())
                    <p class="text-center">Tidak ada data inspeksi yang ditemukan.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Plant</th>
                                <th>Area</th>
                                <th>Sub Area</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Inspection Date</th>
                                <th>Reporter</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inspections as $inspection)
                                <tr>
                                    <td>{{ $inspection->plant }}</td>
                                    <td>{{ $inspection->area }}</td>
                                    <td>{{ $inspection->sub_area }}</td>
                                    <td>{{ $inspection->category }}</td>
                                    <td>{{ $inspection->status }}</td>
                                    <td>{{ $inspection->inspection_date }}</td>
                                    <td>{{ $inspection->reporten }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
