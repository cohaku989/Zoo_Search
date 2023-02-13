@extends ('commons.origin')

@section('contents')

<style>
    .c-postLinks{
        display: none;
    }
    .is_show{
        display: block;
    }
    .is_active{
        color: red;
    }
</style>
    <div class="l-post">
        <figure class="c-post__img"><img src="{{ $post->img }}" alt=""></figure>
        <p class="c-post_text">{{ $post->body }}</p>
        <p class="c-postLink">{{ $post->zoo->zoo_name }}</p>
        <ul class="c-postLinks">
            <li class="c-postLink_item"><a href="/gallery/zoo/{{ $post->zoo->id }}">{{ $post->zoo->zoo_name }}のギャラリーへ</a></li>
            <li class="c-postLink_item"><a href="/zoos/{{ $post->zoo->id }}">{{ $post->zoo->zoo_name }}の詳細ページへ</a></li>
        </ul>
        <p class="c-postLink">{{ $post->animal_family->animal_family }}</p>
        <ul class="c-postLinks">
            <li class="c-postLink_item"><a href="/gallery/animal/{{ $post->animal_family->id }}">{{ $post->animal_family->animal_family }}のギャラリーへ</a></li>
            <li class="c-postLink_item"><a href="/zoos/each/{{ $post->animal_family->id }}">{{ $post->animal_family->animal_family }}がいる動物園一覧ページへ</a></li>
        </ul>
        
    </div>
    
    <style>
        div .likebtn:nth-child(2){
            display: none;
        }
        .is_show{
            display: block!important;
        }
    </style>
    @if (auth('web')->user() && $like === null)
        <div>
            <button data-postid="{{$post->id}}" data-userid="{{$user->id}}" data-like="{{$like}}"class="likebtn">いいね</button>
            <button data-postid="{{$post->id}}" data-userid="{{$user->id}}" data-like="0" style="color:red" class="likebtn">いいね</button>
            <p class="likeNum">{{ $num }}いいね</p>
        </div>
                
    @elseif(auth('web')->user() && $like != null)
        <div>
            <button data-postid="{{$post->id}}" data-userid="{{$user->id}}" data-like="{{$like}}" style="color:red" class="likebtn">いいね</button>
            <button data-postid="{{$post->id}}" data-userid="{{$user->id}}" data-like="1" class="likebtn">いいね</button>
            <p class="likeNum">{{ $num }}いいね</p>
        </div>
            
    @endif
    
    @if( Auth::check() && (Auth::id() == $post->user_id) )
    <div>
        <a href="/myposts/{{ $post->id }}/edit">Edit</a>
    </div>
    
    <form action="/myposts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button> 
    </form>
    
    <div>
        <a href="/myposts" class="c-post__back">My Posts Archive</a>
    </div>
    @endif
    
@endsection