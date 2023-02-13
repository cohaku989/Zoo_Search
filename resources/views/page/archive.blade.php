@extends ('commons.origin')

@section('contents')

    <div class="l-gallery">
        <h2 class="c-galleryTitle">Gallery</h2>
        
        <ul class="p-galleryList">
            @forEach($posts as $post)
            <li class="c-gallery_item"><a href="/gallery/{{$post->id}}"><img src="{{ $post->img }}" alt="{{ $post->animal_family->animal_family }}の写真"></li>
            @endforeach
        </ul>
        
    </div>
    
@endsection