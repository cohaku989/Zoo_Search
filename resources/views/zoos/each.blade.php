@extends ('commons.origin')

@section('contents')

    <style>
        div .favabtn:nth-child(2){
            display: none;
        }
    </style>
    
    <div class="l-main">
        <div class="sp l-side">
            <ul class="sp l-side_list topside">
                <li class="sp l-side_item"><a href="/">TOPページ</a></li>
                <li class="sp l-side_item l-side_srch">
                    <p class="sp l-side_srchTitle">動物園を探す</p>
                    <ul class="sp l-side_srchList">
                        <li class="sp l-side_srchItem"><a href="{{ route('search.place') }}">場所から探す</a></li>
                        <li class="sp l-side_srchItem"><a href="{{ route('search.animal') }}">動物から探す</a></li>
                        <li class="sp l-side_srchItem"><a href="{{ route('search.price') }}">料金から探す</a></li>
                    </ul>
                </li>
                <li class="sp l-side_item"><a href="">サイトについて</a></li>
                <li class="sp l-side_item"><a href="{{ route("gallery") }}">ギャラリー</a></li>
            </ul>
        </div>
        
        <div class="l-content p-pbtn">
            <div class="p-arcAnimal">
            @forEach($anmlfs as $anmlf)
                @if($anmlf->id == $id)
                <h3 class="c-h3">{{ $anmlf->animal_family }}のいる動物園一覧</h3>
                    @if (auth('web')->user() && $fava === null)
                    <div class="p-favaWrap">
                        <button data-anmlfid="{{$anmlf->id}}" data-userid="{{$user->id}}" data-fava="{{$fava}}"class="unfava favabtn"></button>
                        <button data-anmlfid="{{$anmlf->id}}" data-userid="{{$user->id}}" data-fava="0" class="fava favabtn"></button>
                    </div>
                    
                    @elseif(auth('web')->user() && $fava != null)
                    <div class="p-favaWrap">
                        <button data-anmlfid="{{$anmlf->id}}" data-userid="{{$user->id}}" data-fava="{{$fava}}" class="fava favabtn"></button>
                        <button data-anmlfid="{{$anmlf->id}}" data-userid="{{$user->id}}" data-fava="1" class="unfava favabtn"></button>
                    </div>
                
                    @endif
                
                <ul class="p-arcAnimal_list">
                    @forEach($anmlf->zoos as $zoo)
                    <li class="p-arcAnimal_item"><a href="{{ route('zoo.show', $zoo->id) }}">{{ $zoo->zoo_name }}</a></li>
                    @endforeach
                </ul>
                @endif
            @endforeach
                <a href="{{ $prevurl }}" class="c-back">前のページへ戻る</a>
            </div>
        </div>
    </div>
    
@endsection