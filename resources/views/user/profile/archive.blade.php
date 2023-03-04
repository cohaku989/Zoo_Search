@extends ('commons.origin')

@section('contents')

    <div class="l-main">
        <div class="l-side spMy">
            <ul class="l-side_list">
                <li class="l-side_item"><a href="{{ route('dashboard') }}">マイページTOP</a></li>
                <li class="l-side_item"><a href="{{ route('profile.info') }}">アカウント情報</a></li>
                <li class="l-side_item"><a href="{{ route("favzoo") }}">お気に入り動物園</a></li>
                <li class="l-side_item"><a href="{{ route("favanimal") }}">お気に入り動物</a></li>
                <li class="l-side_item"><a href="{{ route("post.archive") }}">MY投稿</a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <x-dropdown-link :href="route('logout')" class="p-logout c-btn" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                    </x-dropdown-link>
            </form>
        </div>
        <div class="l-content">
            <div class="p-profile">
                <h3 class="c-h3">アカウント情報</h3>
                <div class="p-profile_list">
                    <ul class="p-profile_item">
                        <li>名前</li>
                        <li>{{ $user->name }}</li>
                        <li><a class="c-next p-pnext" href="{{ route('profile.edit', 'name') }}" >名前を変更する</a></li>
                    </ul>
                    <ul class="p-profile_item">
                        <li>登録されたメールアドレス</li>
                        <li>{{ $user->email }}</li>
                    </ul>
                    <div class="p-profile_item">
                        <a class="c-next p-pnext" href="{{ route('password.change') }}">パスワード変更</a>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="p-pback c-back">
                    マイページへ戻る
                </a>
            </div>
        </div>
    </div>
    
@endsection