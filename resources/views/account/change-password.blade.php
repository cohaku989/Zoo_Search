@extends ('commons.origin')

@section('contents')
    <div class="l-main">
        <div class="l-side">
            <ul class="l-side_list">
                <li class="l-side_item"><a href="{{ route('dashboard') }}">マイページTOP</a></li>
                <li class="l-side_item"><a href="{{ route('profile.info') }}">アカウント情報</a></li>
                <li class="l-side_item"><a href="{{ route("favzoo") }}">お気に入り動物園</a></li>
                <li class="l-side_item"><a href="{{ route("favanimal") }}">お気に入り動物</a></li>
                <li class="l-side_item"><a href="{{ route("post.archive") }}">MY投稿</a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <x-dropdown-link :href="route('logout')" class="c-btn" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                </x-dropdown-link>
            </form>
        </div>
        
        <div class="l-content">
            <div class="p-profile">
            <h3 class="c-h3">パスワード変更</h3>
            
            <div class="p-profile_edit">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="c-error" :errors="$errors" />
        
                <form method="POST" class="p-profile_eList" action="{{ route('password.update') }}">
                    @csrf
        
                    <div class="p-profile_pw ">
                        <!-- Password -->
                        <div class="p-profile_pwItem">
                            <label for="password" :value="__('Password')">新しいパスワードを入力</label>
                            @props(['disabled' => false])
                            <input {{ $disabled ? 'disabled' : '' }} id="password" type="password" name="password" required />
                        </div>
            
                        <!-- Confirm Password -->
                        <div class="p-profile_pwItem">
                            <label for="password_confirmation" :value="__('Confirm Password')">パスワードを再入力</label>
            
                            <input {{ $disabled ? 'disabled' : '' }} id="password_confirmation" type="password" name="password_confirmation" required />
                        </div>
                    </div>
                    
                    <input class="c-btn p-profile_eItem" type="submit" value="パスワード変更"/>
                </form>
            </div>
            <a href="{{ route('profile.info') }}" class="c-back">
                アカウント情報へ戻る
            </a>
            
        </div>
        </div>
    </div>

@endsection
