<x-guest-layout>
    <div class="l-accountWrap">
        <div class="l-titleWrap">
            <h1 class="c-h1"><a href="/">ZOO_SEARCH</a></h1>
            <h3 class="c-h3">ログイン</h3>
        </div>
        
        <div class="l-formWrap">
        <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <!-- Email Address -->
                <div class="p-formEach">
                    <x-label for="email" class="c-formLabel" :value="__('Email')" />
    
                    <x-input id="email" class="c-formInput" type="email" name="email" :value="old('email')" required autofocus />
                </div>
    
                <!-- Password -->
                <div class="p-formEach">
                    <x-label for="password" class="c-formLabel" :value="__('Password')" />
    
                    <x-input id="password" class="c-formInput"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>
    
                
    
                <div class="p-formSubmit">
                    <!-- Remember Me -->
                    <div class="p-form_remember">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <x-button class="c-btn c-formBtn">
                        {{ __('Log in') }}
                    </x-button>
                    
                    @if (Route::has('password.request'))
                        <a class="c-formLink" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
        <p class="c-back c-text"><a href="/">TOPページへ戻る</a></p>
    </div>
</x-guest-layout>
