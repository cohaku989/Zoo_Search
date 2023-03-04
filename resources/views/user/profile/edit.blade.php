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
                <h3 class="c-h3">名前変更</h3>
                <div class="p-profile_edit">
                    <form action="{{ route('profile.update') }}" method="POST" class="p-profile_eList">
                        @csrf
                        @method('PUT')
                        
                            <label class="p-profile_eItem" for="">変更後の名前</label>
                            <input class="p-profile_eItem" type="text" name="name" value="{{ $user->name }}">
                            
                            <input class="c-btn p-profile_eItem" type="submit" value="変更する"/>
                
                    </form>
                </div>
                <a href="{{ route('profile.info') }}" class="p-pback c-back">
                    アカウント情報へ戻る
                </a>
            </div>
        </div>
    </div>
    
@endsection