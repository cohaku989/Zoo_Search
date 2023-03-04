@extends ('commons.origin')

@section('contents')

    <div class="l-main">
        @if(( Auth::check() && (Auth::id() == $post->user_id) && $prevurl == route('post.archive')) || (Auth::check() && (Auth::id() == $post->user_id) && $prevurl == route('post.edit', $post->id)))
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
        @else
        <div class="sp l-side">
            <ul class="sp l-side_list topside">
                <li class="sp l-side_item"><a href="/">TOPページ</a></li>
                <li class="sp l-side_item l-side_srch">
                    <label for="sp_side" class="sp l-side_srchTitle">動物園を探す</label>
                    <input type="checkbox" class="sp l-side_srchBtn" id="sp_side" />
                    <ul class="sp l-side_srchList">
                        <li class="sp l-side_srchItem"><a href="{{ route('search.place') }}">場所から探す</a></li>
                        <li class="sp l-side_srchItem"><a href="{{ route('search.animal') }}">動物から探す</a></li>
                        <li class="sp l-side_srchItem"><a href="{{ route('search.price') }}">料金から探す</a></li>
                    </ul>
                </li>
                <li class="sp l-side_item"><a href="{{ route('about') }}">サイトについて</a></li>
                <li class="sp l-side_item"><a href="{{ route("gallery") }}">ギャラリー</a></li>
            </ul>
        </div>
        @endif
        
        <div class="l-content p-pbtn">
            <div class="l-each">
                <div class="p-each">
                    <div class="p-eachCont">
                        <figure class="p-each_img"><img src="{{ $post->img }}" alt=""></figure>
                        <p class="p-each_text">{{ $post->body }}</p>
                        <div class="p-each_zooWrap">
                            <p class="p-each_zoo links">{{ $post->zoo->zoo_name }}</p>
                            <ul class="p-each_links">
                                <li class="p-each_link"><a href="{{ route('gallery.zoo', $post->zoo->id) }}">{{ $post->zoo->zoo_name }}のギャラリーへ</a></li>
                                <li class="p-each_link"><a href="{{ route('zoo.show', $post->zoo->id) }}">{{ $post->zoo->zoo_name }}の詳細ページへ</a></li>
                            </ul>
                        </div>
                        <div class="p-each_animalWrap">
                            <p class="p-each_animal links">{{ $post->animal_family->animal_family }}</p>
                            <ul class="p-each_links">
                                <li class="p-each_link"><a href="{{ route('gallery.animal', $post->animal_family->id) }}">{{ $post->animal_family->animal_family }}のギャラリーへ</a></li>
                                <li class="p-each_link"><a href="{{ route('zoo.each', $post->animal_family->id) }}">{{ $post->animal_family->animal_family }}がいる動物園一覧ページへ</a></li>
                            </ul>
                        </div>
                        
                    </div>
                
                    @if (auth('web')->user() && $like === null)
                        <div class="p-likeWrap">
                            <button data-postid="{{$post->id}}" data-userid="{{$user->id}}" data-like="{{$like}}" class="unlike likebtn"></button>
                            <button data-postid="{{$post->id}}" data-userid="{{$user->id}}" data-like="0" class="like likebtn"></button>
                            <p class="likeNum">{{ $num }}いいね</p>
                        </div>
                                
                    @elseif(auth('web')->user() && $like != null)
                        <div class="p-likeWrap">
                            <button data-postid="{{$post->id}}" data-userid="{{$user->id}}" data-like="{{$like}}" class="like likebtn"></button>
                            <button data-postid="{{$post->id}}" data-userid="{{$user->id}}" data-like="1" class="unlike likebtn"></button>
                            <p class="likeNum">{{ $num }}いいね</p>
                        </div>
                            
                    @endif
                </div>
        
                <div class="p-each_user">
                                    
                    @if( Auth::check() && (Auth::id() == $post->user_id) )
                    <div class="p-each_btnWrap">
                        @if($prevurl != route('post.archive') && $prevurl != route('post.edit', $post->id))
                            <a class="c-back" href="{{ $prevurl }}">前ページへ戻る</a>
                        @else
                            <a class="c-back" href="{{ route('post.archive') }}">MY投稿一覧</a>
                        @endif
                        
                    </div>
                    
                    <div class="p-each_userSet">
                        <a class="c-btn" href="{{ route('post.edit', $post->id) }}">投稿を編集する</a>
                        <form action="{{ route('post.delete', $post->id) }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="c-btn" type="submit">投稿を削除する</button> 
                        </form>
                    </div>
                    @else
                        <a class="c-back" href="{{ $prevurl }}">前ページへ戻る</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
@endsection