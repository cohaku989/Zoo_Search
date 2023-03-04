<x-guest-layout>
    <div class="l-accountWrap">
        <div class="l-titleWrap">
            <h1 class="c-h1"><a href="/">ZOO_SEARCH</a></h1>
            <h3 class="c-h3">新規管理者登録画面</h3>
        </div>
        <!-- Validation Errors -->
        <div class="l-formWrap">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
    
                <!-- Name -->
                <div class="p-formEach">
                    <x-label class="c-formLabel" for="name" :value="__('Name')" />
    
                    <x-input id="name" class="c-formInput" type="text" name="name" :value="old('name')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="p-formEach">
                    <x-label for="email" class="c-formLabel" :value="__('Email')" />
    
                    <x-input id="email" class="c-formInput" type="email" name="email" :value="old('email')" required />
                </div>
    
                <!-- Password -->
                <div class="p-formEach">
                    <x-label for="password" class="c-formLabel" :value="__('Password')" />
    
                    <x-input id="password" class="c-formInput"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
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
                        {{ __('Register') }}
                    </x-button>
                    
                    <a class="c-formLink" href="{{ route('admin.login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </div>
        <p class="c-back c-text"><a href="/">TOPページへ戻る</a></p>
    </div>
</x-guest-layout>
