<x-guest-layout>
    <div class="l-accountWrap">

        <div class="l-titleWrap">
            <h1 class="c-h1"><a href="/">ZOO_SEARCH</a></h1>
            <h3 class="c-h3">パスワード再設定画面</h3>
        </div>

        <div class="l-formWrap">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('admin.password.update') }}">
                @csrf
    
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
                <!-- Email Address -->
                <div class="p-formEach">
                    <x-label for="email" class="c-formLabel" :value="__('Email')" />
    
                    <x-input id="email" class="c-formInput" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>
    
                <!-- Password -->
                <div class="p-formEach">
                    <x-label for="password" class="c-formLabel" :value="__('Password')" />
    
                    <x-input id="password" class="c-formInput" type="password" name="password" required />
                </div>
    
                <!-- Confirm Password -->
                <div class="p-formEach">
                    <x-label for="password_confirmation" class="c-formLabel" :value="__('Confirm Password')" />
    
                    <x-input id="password_confirmation" class="c-formInput"
                                        type="password"
                                        name="password_confirmation" required />
                </div>
    
                <div class="p-formSubmit">
                    <x-button class="c-btn">
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
        <p class="c-back c-text"><a href="{{ route('admin.login') }}">管理者ログインページへ戻る</a></p>
    </div>
</x-guest-layout>
