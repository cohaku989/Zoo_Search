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
            <div class="l-post_title">
                <h3 class="c-h3">MY投稿</h3>
                <a class="p-pback c-back" href="{{ route('dashboard') }}">マイページに戻る</a>
                <a class="p-pback c-next" href="{{ route('post.create') }}">新しい投稿</a>
            </div>
            
            <div class="l-post">
            @foreach ($post as $a_post)
                <a href="{{ route('gallery.post', $a_post->id) }}">
                    <div class="l-post_item">
                        <div class="l-post_img">
                            <img src="{{ $a_post->img }}" alt="">
                        </div>
                        <p class="l-post_text">{{ $a_post->body }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        </div>
    </div>
    
@endsection