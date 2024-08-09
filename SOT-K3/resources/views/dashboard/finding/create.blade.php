<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Temuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('findings.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="mr-sm-2" for="gambar_temuan">{{ __('Gambar Temuan') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar_temuan" id="gambar_temuan">
                                <label class="custom-file-label">{{ __('Choose file') }}</label>
                            </div>
                            <x-input-error :messages="$errors->get('gambar_temuan')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <label class="mr-sm-2" for="plant">{{ __('Plant') }}</label>
                            <Select class="form-control"  id="plant" name="plant" required>
                                <option value="2/3">2/3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="Kantor Pusat">Kantor Pusat</option>
                                <option value="Kantor Staff">Kantor Staff</option>
                                <option value="BTG">BTG</option>
                                <option value="Pelabuhan">Pelabuhan</option>
                            </Select>
                            <x-input-error :messages="$errors->get('plant')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="area">{{ __('Area') }}</label>
                            <input type="text" class="form-control" id="area" name="area" value="{{ old('area') }}" required />
                            <x-input-error :messages="$errors->get('area')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="sub_area">{{ __('Sub Area') }}</label>
                            <input type="text" class="form-control" id="sub_area" name="sub_area" value="{{ old('sub_area') }}" required />
                            <x-input-error :messages="$errors->get('sub_area')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="category">{{ __('Category') }}</label>
                            <select name="category" id="category" class="form-control">
                                <option value="Positive">Positive</option>
                                <option value="Negative">Negative</option>
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="status">{{ __('Status') }}</label>
                            <select id="status" class="form-control" name="status" required>
                                <option value="Open">Open</option>
                                <option value="Close">Close</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="condition">{{ __('Condition') }}</label>
                            <input type="text" class="form-control" id="condition" name="condition" value="{{ old('condition') }}" required />
                            <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="description">{{ __('Description') }}</label>
                            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="recommendation">{{ __('Recommendation') }}</label>
                            <textarea id="recommendation" name="recommendation" class="form-control" rows="4">{{ old('recommendation') }}</textarea>
                            <x-input-error :messages="$errors->get('recommendation')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="mr-sm-2" for="inspection_date">{{ __('Inspection Date') }}</label>
                            <input type="date" class="form-control" id="inspection_date" name="inspection_date" value="{{ old('inspection_date') }}" required />
                            <x-input-error :messages="$errors->get('inspection_date')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('success'))
                toastr.success("{{ session('success') }}", null, { positionClass: 'toast-top-right' });
            @endif
            @if(session('error'))
                toastr.error("{{ session('error') }}", null, { positionClass: 'toast-top-right' });
            @endif
            @if(session('info'))
                toastr.info("{{ session('info') }}", null, { positionClass: 'toast-top-right' });
            @endif
            @if(session('warning'))
                toastr.warning("{{ session('warning') }}", null, { positionClass: 'toast-top-right' });
            @endif

            // Hide preloader when page is loaded
            window.addEventListener('load', function() {
                document.getElementById('preloader').style.display = 'none';
            });
        });
    </script>
</x-app-layout>
