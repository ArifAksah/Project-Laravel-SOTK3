<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0 justify-content-center">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="{{ asset('assets/images/oh.png') }}" alt="logo" style="max-width: 200px;">
                            </div>
                            <h4 class="text-center">Hello! Let's get started</h4>
                            <h6 class="fw-light text-center">Sign in to continue.</h6>

                            <form method="POST" action="{{ route('login') }}" class="pt-3">
                                @csrf

                                <!-- Email Address -->
                                <div class="form-group">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Username"/>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="form-group mt-4">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="form-control form-control-lg" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Remember Me -->
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label for="remember_me" class="form-check-label text-muted">
                                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember"> Keep me signed in
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
                                    @endif
                                </div>

                                <div class="mt-3 d-grid gap-2">
                                    <x-primary-button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">
                                        {{ __('Sign in') }}
                                    </x-primary-button>
                                </div>


                                <div class="text-center mt-4 fw-light">
                                    Daftar sebagai tamu? <a href="{{ route('register') }}" class="text-primary">Buat</a>
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
