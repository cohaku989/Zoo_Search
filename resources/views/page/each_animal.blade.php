@extends ('commons.origin')

@section('contents')

    <div class="l-gallery">
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
        
        <div class="l-content p-pbtn">
        @forEach($posts as $post)
            <h2 class="c-galleryTitle">{{ $post->animal_family->animal_family }}のGallery</h2>
            <div class="p-gallery_wrap">
                <ul class="p-galleryList">
                    @forEach($posts as $post)
                    <li class="c-gallery_item"><a href="{{ route('gallery.post', $post->id) }}"><img src="{{ $post->img }}" alt="{{ $post->animal_family->animal_family }}の写真"></a></li>
                    @endforeach
                </ul>
            </div>
            @break
        @endforeach
        
            <a href="{{ $prevurl }}" class="c-back">前のページへ戻る</a>
        </div>
        
    </div>
    
@endsection