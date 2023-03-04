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
            <div class="l-post_title">
                <h3 class="c-h3">動物園リスト</h3>
                <a class="p-pback c-back" href="{{ route('admin.dashboard') }}">管理者ページへ</a>
                <a class="p-pback c-next" href="{{ route("zoo.create") }}">動物園登録</a>
            </div>
            
            <ul class="l-post_zoo">
            @foreach($zoo as $a_zoo)
                <li class="l-post_zooItem"><a href="{{ route('zoo.show', $a_zoo->id) }}">{{ $a_zoo->zoo_name }}</a></li>
            @endforeach
            </ul>
        </div>
        
    </div>
    
@endsection