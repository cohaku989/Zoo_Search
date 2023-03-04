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
    <div class="l-content">
        <div class="p-profile">
            <h3 class="c-h3">管理者ページ</h3>
            <ul class="p-dashWrap p-admin">
                <li class="p-dashWrap_item"><a href="{{ route('admin.archive') }}">アカウント<br>情報</a></li>
                <li class="p-dashWrap_item"><a href="{{ route('zoo.archive') }}">動物園リスト</a></li>
                
            </ul>
        </div>
    </div>
</div>

@endsection