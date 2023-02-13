@extends ('commons.origin')

@section('contents')

<style>
    .p-animalOrder, .p-animalFamily{
        display: none;
    }
    .is_show {
        display: block;
    }
    .is_active{
        color: red;
    }

</style>
    <nav class="p-nav">
        <ul class="">
            <li class="p-nav_list"><a href="#place">場所から探す</a></li>
            <li class="p-nav_list"><a href="/top_animals#animals">動物から探す</a></li>
            <li c="p-nav_list"><a href="/top_price#price">料金から探す</a></li>
        </ul>
    </nav>
    
    <h2 class="c-topTitle">動物カテゴリ別</h2>
    
    <div class="l-animal">
        <ul class="p-animalClass">
            @forEach($animal_rel as $animal_class)
            <li id="animal_cando{{ $animal_class->id }}" class="c-animalClass_each">{{ $animal_class->animal_class }}</li>
            <li class="p-animalOrder">
                <ul>
                    @forEach($animal_class->animal_orders as $animal_order)
                    <li id="animal_oandf{{ $animal_order->id }}" class="c-animalOrder_each animal_cando{{ $animal_order->animal_class_id }}">{{ $animal_order->animal_order }}</li>
                    <li class="p-animalFamily">
                        <ul>
                            @forEach($animal_order->animal_families as $animal_family)
                            <li class="c-animalFamily_each animal_oandf{{ $animal_family->animal_order_id }}">
                                <a href="/zoos/each/{{ $animal_family->id}}">{{ $animal_family->animal_family }}のいる動物園</a>
                            </li>
                            @endforeach
                        </ul> 
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
        
    </div>
        
    
@endsection