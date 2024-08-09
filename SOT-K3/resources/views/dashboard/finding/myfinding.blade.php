<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Findings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($findings->isEmpty())
                        <p>{{ __('No findings found.') }}</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('Gambar Temuan') }}</th>
                                        <th>{{ __('Detail Temuan') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($findings as $finding)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/'.$finding->gambar_temuan) }}" alt="Finding Image" class="img-thumbnail" style="max-width: 150px;">
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>{{ __('Kategori') }}:</strong> {{ $finding->category }}</p>
                                                        <p><strong>{{ __('Status') }}:</strong> {{ $finding->status }}</p>
                                                        <p><strong>{{ __('Reporter') }}:</strong> {{ $finding->dibuat_oleh }}</p>
                                                        <p><strong>{{ __('Pabrik') }}:</strong> {{ $finding->plant }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>{{ __('Area') }}:</strong> {{ $finding->area }}</p>
                                                        <p><strong>{{ __('Area Bagian') }}:</strong> {{ $finding->sub_area }}</p>
                                                        <p><strong>{{ __('Kondisi') }}:</strong> {{ $finding->condition }}</p>
                                                        <p><strong>{{ __('Deskripsi') }}:</strong> {{ $finding->description }}</p>
                                                        <p><strong>{{ __('Rekomendasi') }}:</strong> {{ $finding->recommendation }}</p>
                                                        <p><strong>{{ __('Tanggal temuan') }}:</strong> {{ $finding->inspection_date }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('findings.edit', $finding->id) }}" class="btn btn-sm btn-success">{{ __('Edit') }}</a>
                                                <form action="{{ route('findings.destroy', $finding->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($findings instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $findings->links() }}
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
