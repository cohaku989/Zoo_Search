@extends ('commons.origin')

@section('contents')

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
            <div class="l-main__zoo__create">
                <a href="/zoos/create">Create</a>
            </div>
            
            @foreach($zoo as $a_zoo)
                <div class="zoo__list">
                    <h3 class="zoo__title"><a href="/zoos/{{ $a_zoo->id }}">{{ $a_zoo->zoo_name }}</a></h3>
                    <p class="zoo__text">{{ $a_zoo->caption }}</p>
                </div>
            @endforeach
        </div>
        
    </div>
    
@endsection