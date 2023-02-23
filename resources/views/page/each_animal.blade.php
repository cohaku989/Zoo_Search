@extends ('commons.origin')

@section('contents')

    <div class="l-gallery">
        <div class="l-side">
            <ul class="l-side_list">
                <li class="l-side_item"><a href="/">TOPページ</a></li>
                <li class="l-side_item l-side_srch">
                    <p class="l-side_srchTitle">動物園を探す</p>
                    <ul class="l-side_srchList">
                        <li class="l-side_srchItem"><a href="{{ route('search.place') }}">場所から探す</a></li>
                        <li class="l-side_srchItem"><a href="{{ route('search.animal') }}">動物カテゴリから探す</a></li>
                        <li class="l-side_srchItem"><a href="{{ route('search.price') }}">入園料金から探す</a></li>
                    </ul>
                </li>
                <li class="l-side_item"><a href="">サイトについて</a></li>
                <li class="l-side_item"><a href="{{ route("gallery") }}">ギャラリー</a></li>
            </ul>
        </div>
        
        <div class="l-content">
        @forEach($posts as $post)
            <h2 class="c-galleryTitle">{{ $post->animal_family->animal_family }}のGallery</h2>
            <ul class="p-galleryList">
                @forEach($posts as $post)
                <li class="c-gallery_item"><a href="{{ route('gallery.post', $post->id) }}"><img src="{{ $post->img }}" alt="{{ $post->animal_family->animal_family }}の写真"></a></li>
                @endforeach
            </ul>
            @break
        @endforeach
        </div>
        
    </div>
    
@endsection