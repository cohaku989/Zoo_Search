@extends ('commons.origin')

@section('contents')

<style>
    .c-animal_order, .c-animal_family{
        display: none;
    }
</style>
<div class="l-main">
    <div class="sp l-side">
        <ul class="sp l-side_list topside">
            <li class="sp l-side_item"><a href="/">TOPページ</a></li>
            <li class="sp l-side_item l-side_srch">
                <label for="sp_side" class="sp l-side_srchTitle">動物園を探す</label>
                <input type="checkbox" class="sp l-side_srchBtn" id="sp_side" />
                
                <ul class="sp l-side_srchList">
                    <li class="sp l-side_srchItem"><a href="{{ route('search.place') }}">場所から探す</a></li>
                    <li class="sp l-side_srchItem"><a href="{{ route('search.animal') }}">動物から探す</a></li>
                    <li class="sp l-side_srchItem"><a href="{{ route('search.price') }}">料金から探す</a></li>
                </ul>
            </li>
            <li class="sp l-side_item"><a href="{{ route('about') }}">サイトについて</a></li>
            <li class="sp l-side_item"><a href="{{ route("gallery") }}">ギャラリー</a></li>
        </ul>
    </div>
    
    <div class="l-content">
        <ul class="p-top_tab">
            <li class="p-top_tabItem"><a href="{{ route("search.place") }}">場所から探す</a></li>
            <li class="p-top_tabItem is_tabActive"><a href="{{ route("search.animal") }}">動物から探す</a></li>
            <li class="p-top_tabItem"><a href="{{ route("search.price") }}">料金から探す</a></li>
        </ul>
        <div class="p-animal l-topContent">
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
                     <li id="animal_oandf{{ $animal_family->id }}" class="c-animal_familyItem animal_oandf{{ $animal_family->animal_order_id }}"><a href="{{ route('zoo.each', $animal_family->id) }}">{{ $animal_family->animal_family }}のいる動物園</a></li>
                    @endforEach
            </ul>
            @endforEach
        @endforEach
        
    </div>
    </div>
</div>
    
@endsection