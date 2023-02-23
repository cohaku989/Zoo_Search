@extends ('commons.origin')

@section('contents')
    <style>
        div .favzbtn:nth-child(2){
            display: none;
        }
    </style>
    
    <div class="l-main">
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
            <div class="l-zoo">
            <h2 class="c-zoo_name">{{ $zoo->zoo_name }}</h2>
            <p class="c-zoo_text">{{ $zoo->caption }}</p>
            <p class="c-zoo_adress">{{ $zoo->adress }}</p>
            <!-- ここにGoogle Mapを表示する -->
            <div id="map" class="c-zoo_map" style="height:200px"></div>
    
            
            <ul class="l-zoo_anmlF">
            @foreach($zoo->animal_families as $s_zoo)
                <li class="c-zoo_anmlEach">{{ $s_zoo->animal_family }}</li>
            @endforeach
            </ul>
            
            
            <a href="{{ $zoo->hp_url }}" class="c-zoo_url">{{ $zoo->zoo_name }}のホームページ</a>
            
            
            <ul class="l-zoo_priceList">
                <li class="c-zoo_priceItem">{{ $zoo->seniors_price }}</li>
                <li class="c-zoo_priceItem">{{ $zoo->adults_price }}</li>
                <li class="c-zoo_priceItem">{{ $zoo->hsstudents_price }}</li>
                <li class="c-zoo_priceItem">{{ $zoo->jhsstudents_price }}</li>
                <li class="c-zoo_priceItem">{{ $zoo->esstudents_price }}</li>
                <li class="c-zoo_priceItem">{{ $zoo->children_price }}</li>
            </ul>
            
        </div>
    
        
            @if (auth('web')->user())
                @if( $favz === null )
                <div>
                    <button data-zooid="{{$zoo->id}}" data-userid="{{$user->id}}" data-favz="{{$favz}}"class="favzbtn">いいね</button>
                    <button data-zooid="{{$zoo->id}}" data-userid="{{$user->id}}" data-favz="0" style="color:red" class="favzbtn">いいね</button>
                </div>
                
                
                @elseif($favz != null)
                <div class="favz">
                    <button data-zooid="{{$zoo->id}}" data-userid="{{$user->id}}" data-favz="{{$favz}}" style="color:red" class="favzbtn">いいね</button>
                    <button data-zooid="{{$zoo->id}}" data-userid="{{$user->id}}" data-favz="1" class="favzbtn">いいね</button>
                </div>
                @endif
            
            @endif
        
            <div class="p-each_user">
            @auth('admin')
            <div>
                <a href="/zoos/{{ $zoo->id }}/edit">Edit</a>
            </div>
            
            <form action="/zoos/{{ $zoo->id }}" id="form_{{ $zoo->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button> 
            </form>
            
            <div>
                <a href="/zoos" class="c-zoo__back">Zoo Archive</a>
            </div>
            @endauth
        </div>
        
        </div>
    </div>
    
    <!-- APIキーを指定してjsファイルを読み込む -->
        <script>
          let address = @json($zoo->adress);
        </script>
        
@endsection