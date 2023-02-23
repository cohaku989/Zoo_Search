@extends ('commons.origin')

@section('contents')
    <div class="l-main">
        <div class="l-side">
            <ul class="l-side_list">
                <li class="l-side_item"><a href="{{ route('dashboard') }}">マイページTOP</a></li>
                <li class="l-side_item"><a href="{{ route('profile.info') }}">アカウント情報</a></li>
                <li class="l-side_item"><a href="{{ route("favzoo") }}">お気に入り動物園</a></li>
                <li class="l-side_item"><a href="{{ route("favanimal") }}">お気に入り動物</a></li>
                <li class="l-side_item"><a href="{{ route("post.archive") }}">MY投稿</a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <x-dropdown-link :href="route('logout')" class="c-btn" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                </x-dropdown-link>
            </form>
        </div>
        <div class="l-content">
            <form action="{{ route('post.store') }}" class="p-fPost" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="p-fPost_wrap">
                <label for="imgBtn" class="c-btn" id="imgLabel">ファイルを選択</label>
                <input type="file" id="imgBtn" class="preview" name="img">
                <p id="file_name" class="p-fPost_iName"></p>
                <div class="p-fPost_img">
                    <img id="preview_area" src="">
                </div>
                <p class="title__error" style="color:red">{{ $errors->first('img') }}</p>
            </div>
                
            <div class="p-fPost_wrap">
                <label class="p-fPost_label" for="post_text">Body</label>
                <textarea class="p-fPost_text" name="post[body]" placeholder="内容"></textarea>
            </div>
                
            <div class="p-fPost_wrap">
                <label class="p-fPost_label" for="zoo_name">Zoo</label>
                <input list="zoo_foptions" id="posted_zoo_show" class="datalist p-fPost_datalist"/>
                <datalist id="zoo_foptions">
                    @foreach($zoos as $zoo)
                        <option value="{{ $zoo->zoo_name }}" data-id="{{$zoo->id}}"></option>
                    @endforeach
                </datalist>
                <input id="posted_zoo_hide" type="hidden" name="post[zoo_id]" value="" />
                <p class="body__error" style="color:red">{{ $errors->first('post.zoo_id') }}</p>
            </div>
                
            <div class="p-fPost_wrap">
                <label class="p-fPost_label" for="animal_name">Animal</label>
                <input list="animal_options" id="posted_animal_show" class="datalist p-fPost_datalist"  />
                <datalist id="animal_options">
                    @foreach($animals as $animal)
                        <option value="{{ $animal->animal_family }}" data-id="{{ $animal->id }}"></option>
                    @endforeach
                </datalist>
                <input id="posted_animal_hide" type="hidden" name="post[animal_family_id]" value="" />
                <p class="body__error" style="color:red">{{ $errors->first('post.animal_family_id') }}</p>
            </div>
            
            <div class="p-fPost_wrap">        
                <input class="c-btn" type="submit" value="投稿"/>
            </div>
        </form>
            
            <a class="c-back p-fPost_btn" href="{{ route('post.archive') }}">
                MY投稿へ戻る
            </a>
        </div>
    </div>
@endsection