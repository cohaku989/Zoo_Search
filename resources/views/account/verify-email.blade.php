<x-guest-layout>
    <div class="l-accountWrap">

        <div class="l-titleWrap">
            <h1 class="c-h1"><a href="/">ZOO_SEARCH</a></h1>
        </div>

        <div class="l-formWrap">
            <div class="p-form_forgotPw c-text">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
    
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
    
            <div class="p-formSubmit">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
    
                    <div>
                        <x-button>
                            {{ __('Resend Verification Email') }}
                        </x-button>
                    </div>
                </form>
    
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <button type="submit" class="c-formLink">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
