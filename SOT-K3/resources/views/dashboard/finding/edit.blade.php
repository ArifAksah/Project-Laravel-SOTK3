<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Temuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('findings.update', $finding->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="mr-sm-2" for="gambar_temuan">{{ __('Gambar Temuan') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar_temuan" id="gambar_temuan">
                                <label class="custom-file-label">{{ __('Choose file') }}</label>
                            </div>
                            <x-input-error :messages="$errors->get('gambar_temuan')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="group">{{ __('kelompok') }}</label>
                            <input type="text" class="form-control" id="group" name="group" value="{{ old('group', $finding->group) }}" required />
                            <x-input-error :messages="$errors->get('group')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="plant">{{ __('Pabrik') }}</label>
                            <input type="text" class="form-control" id="plant" name="plant" value="{{ old('plant', $finding->plant) }}" required />
                            <x-input-error :messages="$errors->get('plant')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="area">{{ __('Area') }}</label>
                            <input type="text" class="form-control" id="area" name="area" value="{{ old('area', $finding->area) }}" required />
                            <x-input-error :messages="$errors->get('area')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="sub_area">{{ __('Area Bagian') }}</label>
                            <input type="text" class="form-control" id="sub_area" name="sub_area" value="{{ old('sub_area', $finding->sub_area) }}" required />
                            <x-input-error :messages="$errors->get('sub_area')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="category">{{ __('Kategori') }}</label>
                            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $finding->category) }}" required />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="status">{{ __('Status') }}</label>
                            <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $finding->status) }}" required />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="condition">{{ __('Kondisi') }}</label>
                            <input type="text" class="form-control" id="condition" name="condition" value="{{ old('condition', $finding->condition) }}" required />
                            <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="description">{{ __('Deskripsi') }}</label>
                            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $finding->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="recommendation">{{ __('Rekomendasi') }}</label>
                            <textarea id="recommendation" name="recommendation" class="form-control" rows="4">{{ old('recommendation', $finding->recommendation) }}</textarea>
                            <x-input-error :messages="$errors->get('recommendation')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="inspection_date">{{ __('Tanggal temuan') }}</label>
                            <input type="date" class="form-control" id="inspection_date" name="inspection_date" value="{{ old('inspection_date', $finding->inspection_date) }}" required />
                            <x-input-error :messages="$errors->get('inspection_date')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
