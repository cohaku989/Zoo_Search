@extends ('commons.origin')

@section('contents')

    <div class="l-main__post">
        <div class="l-main__post__create">
            <a href="/myposts/create">Create</a>
        </div>
        
        @foreach ($post as $a_post)
            <div class="l-main__postItem">
                <!-- 一時的リンクタイトル -->
                <div><a href="/gallery/{{ $a_post->id }}"><img src="{{ $a_post->img }}" alt=""></a></div>
                <figure class="l-main__post__img"><img src="" alt=""></figure>
                <p class="l-main__post__text">{{ $a_post->body }}</p>
                <p class="l-main__post__place"></p>
                <p class="l-main__post__animal"></p>
            </div>
        @endforeach
        
    </div>
    
@endsection