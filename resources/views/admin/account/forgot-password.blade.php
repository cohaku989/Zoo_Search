<x-guest-layout>
    <div class="l-accountWrap">

        <div class="l-titleWrap">
            <h1 class="c-h1"><a href="/">ZOO_SEARCH</a></h1>
            <h3 class="c-h3">パスワード再設定用メールアドレス入力</h3>
        </div>

        <div class="l-formWrap">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf
    
                <p class="p-form_forgotPw c-text">パスワードをお忘れの方は、下記フォームにご登録中のメールアドレスをご入力の上、送信ボタンをクリックしてください。ご登録いただいたメールアドレスにパスワード再設定ページのURLを記載したメールをお送りいたします。</p>
                <!-- Email Address -->
                <div class="p-formEach">
                    <x-label for="email" class="c-formLabel" :value="__('Email')" />
    
                    <x-input id="email" class="c-formInput" type="email" name="email" :value="old('email')" required autofocus />
                </div>
    
                <div class="p-formSubmit">
                    <x-button class="c-btn">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>
        <p class="c-back"><a href="{{ route('admin.login') }}">管理者ログインページへ戻る</a></p>
    </div>
</x-guest-layout>
