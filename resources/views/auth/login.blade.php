<!DOCTYPE html>
<html lang="en">
@include('auth.core.header')
<body>
<header id="header">
    @include('auth.core.header-top')
    @include('auth.core.header-middle')
    @include('auth.core.header-bottom')
</header><!--/header-->

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')"/>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                    <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')"/>

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="old('email')" required autofocus/>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')"/>

                            <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     required autocomplete="current-password"/>
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                   href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ml-3">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            @include('auth.register')
        </div>
    </div>
</section><!--/form-->
@include('auth.core.footer')
<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>

