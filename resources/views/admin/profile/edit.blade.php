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
                <x-dropdown-link :href="route('admin.logout')" class="c-btn" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                </x-dropdown-link>
            </form>
        </div>
        
        <div class="l-content adminSet">
            <div class="p-profile">
                <h3 class="c-h3">名前変更</h3>
                <div class="p-profile_edit">
                    <form action="{{ route('admin.update') }}" method="POST" class="p-profile_eList">
                        @csrf
                        @method('PUT')
                        
                        <label class="p-profile_eItem" for="">名前を変更</label>
                        <input class="p-profile_eItem" type="text" name="name" value="{{ $admin->name }}">
                        
                        <input class="p-profile_eItem c-btn" type="submit" value="変更する"/>
       
                    </form>
                </div>
                <a href="{{ route('admin.archive') }}" class="p-pback c-back">
                    アカウント情報へ戻る
                </a>
                
            </div>
        </div>
    </div>
@endsection