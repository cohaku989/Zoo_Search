<x-guest-layout>
    <div class="l-accountWrap">
        <div class="l-titleWrap">
            <h1 class="c-h1"><a href="/">ZOO_SEARCH</a></h1>
        </div>

        <div class="l-formWrap">
            <div class="p-form_forgotPw c-text">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
    
                <!-- Password -->
                <div class="p-formEach">
                    <x-label for="password" class="c-formLabel" :value="__('Password')" />
    
                    <x-input id="password" class="c-formInput"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
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
                    <x-button>
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
