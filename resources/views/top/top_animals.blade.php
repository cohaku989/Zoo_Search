@extends ('commons.origin')

@section('contents')

<style>
    .c-animal_order, .c-animal_family{
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
        <ul class="p-top_tab">
            <li class="p-top_tabItem"><a href="{{ route("search.place") }}">場所から探す</a></li>
            <li class="p-top_tabItem"><a href="{{ route("search.animal") }}">動物から探す</a></li>
            <li class="p-top_tabItem"><a href="{{ route("search.price") }}">料金から探す</a></li>
        </ul>
        <div class="p-animal l-topContent">
        <h2 class="c-topTitle">動物カテゴリ別</h2>
        <ul class="c-animal_class">
            @forEach($animal_rel as $animal_class)
            <li id="animal_cando{{ $animal_class->id }}" class="c-animal_classItem">{{ $animal_class->animal_class }}</li>
            @endforeach
        </ul>
        
        @forEach($animal_rel as $animal_class)
        <ul class="c-animal_order">
                @forEach($animal_class->animal_orders as $animal_order)
                 <li id="animal_oandf{{ $animal_order->id }}" class="c-animal_orderItem animal_cando{{ $animal_order->animal_class_id }}">{{ $animal_order->animal_order }}</li>
                @endforEach
        </ul>
        @endforEach
        
        @forEach($animal_rel as $animal_class)
            @forEach($animal_class->animal_orders as $animal_order)
            <ul class="c-animal_family">
                    @forEach($animal_order->animal_families as $animal_family)
                     <li id="animal_oandf{{ $animal_family->id }}" class="c-animal_familyItem animal_oandf{{ $animal_family->animal_order_id }}"><a href="/zoos/each/{{ $animal_family->id }}">{{ $animal_family->animal_family }}</a></li>
                    @endforEach
            </ul>
            @endforEach
        @endforEach
        
    </div>
    </div>
</div>
    
@endsection