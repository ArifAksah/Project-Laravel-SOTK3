<x-guest-layout>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="../../assets/images/oh.png" alt="logo">
                            </div>
                            <h4>Daftar Akun</h4>
                            <h6 class="fw-light">Bergabunglah dengan kami dalam beberapa menit</h6>
                            <form method="POST" action="{{ route('register') }}" class="pt-3">
                                @csrf
                                
                                <!-- Username -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Nama Lengkap" value="{{ old('username') }}" required autofocus autocomplete="username">
                                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <!-- Asal Perusahaan -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="asal_perusahaan" name="asal_perusahaan" placeholder="Asal Perusahaan" value="{{ old('asal_perusahaan') }}" required autocomplete="Asal Perusahaan">
                                    <x-input-error :messages="$errors->get('asal_perusahaan')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <!-- Hidden Field for Role -->
                                <input type="hidden" name="role" value="quest">

                                <!-- Terms & Conditions -->
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" required> I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">SIGN UP</button>
                                </div>

                                <div class="text-center mt-4 fw-light">
                                    Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
</x-guest-layout>
