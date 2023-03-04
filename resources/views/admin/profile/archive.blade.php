@extends ('commons.origin')

@section('contents')

    <div class="l-main">
        <div class="spMy spadmin l-side">
            <ul class="l-side_list">
                <li class="l-side_item"><a href="{{ route('admin.dashboard') }}">管理者ページTOP</a></li>
                <li class="l-side_item"><a href="{{ route('admin.archive') }}">アカウント情報</a></li>
                <li class="l-side_item"><a href="{{ route('zoo.archive') }}">動物園リスト</a></li>
            </ul>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <x-dropdown-link :href="route('admin.logout')" class="p-logout c-btn" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                </x-dropdown-link>
            </form>
        </div>
        
        <div class="l-content adminSet">
            <div class="p-profile">
                <h3 class="c-h3">マイページ</h3>
                <div class="p-profile_list">
                    <ul class="p-profile_item">
                        <li>名前</li>
                        <li>{{ $admin->name }}</li>
                        <li><a class="p-pnext c-next" href="{{ route('admin.edit', "name") }}" >名前を変更する</a></li>
                    </ul>
                    <ul class="p-profile_item">
                        <li>登録されたメールアドレス</li>
                        <li>{{ $admin->email }}</li>
                    </ul>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="p-pback c-back">
                    管理者ページへ戻る
                </a>
            </div>
        </div>
    </div>
@endsection