@extends ('commons.origin')

@section('contents')

    <img src="{{ $post->img }}">
    
    <form action="/myposts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="post_text">Body</label>
        <br>
        <textarea name="post[body]" placeholder="内容">{{ $post->body }}</textarea>
        <br>
        <label for="zoo_name">Zoo</label>
        <br>
        <input list="zoo_options" id="posted_zoo" name="post[zoo_id]" value="{{ $post->zoo->zoo_name }}" />
        <datalist id="zoo_options">
            @foreach($zoos as $zoo)
                <option value="{{ $zoo->id }}">{{ $zoo->zoo_name }}</option>
            @endforeach
        </datalist>
        <br>
        <label for="animal_name">Animal</label>
        <br>
        <input list="animal_options" id="posted_animal" name="post[animal_family_id]" value="{{ $post->animal_family->animal_family}}" />
        <datalist id="animal_options">
            @foreach($animals as $animal)
                <option value="{{ $animal->id }}">{{ $animal->animal_family }}</option>
            @endforeach
        </datalist>
        <br>

            
        <input type="submit" value="更新"/>
    </form>
    
    <div>
        <a href="/gallery/{{ $post->id }}" class="l-main__post__back">My Post</a>
    </div>
    
@endsection