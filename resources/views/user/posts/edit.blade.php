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
            <form action="{{ route('post.update', $post->id) }}" class="p-fPost" name="formEdit" method="POST">
                @csrf
                @method('PUT')
                
                <div class="p-fPost_wrap">
                    <figure class="p-fPost_editImg">
                        <img src="{{ $post->img }}">
                    </figure>
                </div>
                
                <div class="p-fPost_wrap">
                    <label class="p-fPost_label" for="post_text">キャプション</label>
                    <textarea class="p-fPost_text" name="post[body]" placeholder="内容">{{ $post->body }}</textarea>
                </div>
                
                <div class="p-fPost_wrap">
                    <label class="p-fPost_label" for="zoo_name">タグ付けする動物園</label>
                    <input list="zoo_options" id="posted_zoo_show" class="datalist p-fPost_datalist" />
                    <datalist id="zoo_options">
                        @foreach($zoos as $zoo)
                            <option value="{{ $zoo->zoo_name }}" data-id="{{ $zoo->id }}"></option>
                        @endforeach
                    </datalist>
                    <input type="hidden" id="posted_zoo_hide" name="post[zoo_id]" value="{{ $post->zoo_id }}" data-val="{{ $post->zoo->zoo_name }}" />
                    <p class="body__error" style="color:red">{{ $errors->first('post.zoo_id') }}</p>
                </div>
                
                <div class="p-fPost_wrap">
                    <label class="p-fPost_label" for="animal_name">タグ付けする動物</label>
                    <input list="animal_options" id="posted_animal_show" class="datalist p-fPost_datalist" />
                    <datalist id="animal_options">
                        @foreach($animals as $animal)
                            <option value="{{ $animal->animal_family }}" data-id="{{ $animal->id }}"></option>
                        @endforeach
                    </datalist>
                    <input type="hidden" id="posted_animal_hide" name="post[animal_family_id]" value="{{ $post->animal_family_id }}" data-val="{{ $post->animal_family->animal_family }}" />
                    <p class="body__error" style="color:red">{{ $errors->first('post.animal_family_id') }}</p>
                </div>
                
                <div class="p-fPost_wrap"> 
                    <input class="p-pbtn c-btn" type="submit" value="更新"/>
                </div>
            </form>
            <a class="c-back p-fPost_btn" href="{{ route('gallery.post', $post->id) }}">
                編集をやめる
            </a>
        </div>
    </div>
@endsection