@extends ('commons.origin')

@section('contents')

<style>
    .p-priceZoo{
        display: none;
    }
    .is_show {
        display: block;
    }
    .is_active {
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
    
    <h2 class="c-topTitle">入園料金別</h2>
    
    <div class="l-animal">
        <ul class="p-priceAge">
            <li class="p-priceAge_item" id="seniors">シニア</li>
            <li class="p-priceAge_item" id="adults">大人</li>
            <li class="p-priceAge_item" id="hsstudents">高校生</li>
            <li class="p-priceAge_item" id="jhsstudents">中学生</li>
            <li class="p-priceAge_item" id="esstudents">小学生</li>
            <li class="p-priceAge_item" id="childr">こども</li>
        </ul>
        <div class="p-priceEach">
            <li class="p-priceEach_item" id="2thou">2000円以上</li>
            <li class="p-priceEach_item" id="thou">1000円以上</li>
            <li class="p-priceEach_item" id="5hund">500円以上</li>
            <li class="p-priceEach_item" id="free">無料</li>
        </div>
        
        <div class="">
            <!--price-->
            <ul class="p-priceZoo" id="senior">
                @forEach($zoos as $zoo)
                <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->seniors_price }}</li>
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="hsstudent">
                @forEach($zoos as $zoo)
                <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->hsstudents_price }}</li>
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="adult">
                @forEach($zoos as $zoo)
                <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->adults_price }}</li>
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="jhsstudent">
                @forEach($zoos as $zoo)
                <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->jhsstudents_price }}</li>
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="esstudent">
                @forEach($zoos as $zoo)
                <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->esstudents_price }}</li>
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="child">
                @forEach($zoos as $zoo)
                <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->children_price }}</li>
                @endforeach
            </ul>
            
            
        <!--age-price-->
        <!--senior-->
            <ul class="p-priceZoo" id="seniors2thou">
                @forEach($zoos as $zoo)
                    @if($zoo->seniors_price >= 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->seniors_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="seniorsthou">
                @forEach($zoos as $zoo)
                    @if($zoo->seniors_price >= 1000 && $zoo->seniors_price < 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->seniors_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="seniors5hund">
                @forEach($zoos as $zoo)
                    @if($zoo->seniors_price >= 500 && $zoo->seniors_price < 1000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->seniors_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="seniorsfree">
                @forEach($zoos as $zoo)
                    @if($zoo->seniors_price >= 10 && $zoo->seniors_price < 500)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->seniors_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <!--adults-->
            <ul class="p-priceZoo" id="adults2thou">
                @forEach($zoos as $zoo)
                    @if($zoo->adults_price >= 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->adults_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="adultsthou">
                @forEach($zoos as $zoo)
                    @if($zoo->seniors_price >= 1000 && $zoo->seniors_price < 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->adults_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="adults5hund">
                @forEach($zoos as $zoo)
                    @if($zoo->adults_price >= 500 && $zoo->adults_price < 1000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->adults_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="adultsfree">
                @forEach($zoos as $zoo)
                    @if($zoo->seniors_price >= 0 && $zoo->seniors_price < 500)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->adults_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <!--hsstudents-->
            <ul class="p-priceZoo" id="hsstudents2thou">
                @forEach($zoos as $zoo)
                    @if($zoo->hsstudents_price >= 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->hsstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="hsstudentsthou">
                @forEach($zoos as $zoo)
                    @if($zoo->hsstudents_price >= 1000 && $zoo->hsstudents_price < 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->hsstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="hsstudents5hund">
                @forEach($zoos as $zoo)
                    @if($zoo->hsstudents_price >= 500 && $zoo->hsstudents_price < 1000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->hsstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="hsstudentsfree">
                @forEach($zoos as $zoo)
                    @if($zoo->hsstudents_price >= 0 && $zoo->hsstudents_price < 500)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->hsstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <!--jhsstudents-->
            <ul class="p-priceZoo" id="jhsstudents2thou">
                @forEach($zoos as $zoo)
                    @if($zoo->jhsstudents_price >= 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->jhsstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="jhsstudentsthou">
                @forEach($zoos as $zoo)
                    @if($zoo->jhsstudents_price >= 1000 && $zoo->jhsstudents_price < 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->jhsstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="jhsstudents5hund">
                @forEach($zoos as $zoo)
                    @if($zoo->jhsstudents_price >= 500 && $zoo->jhsstudents_price < 1000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->jhsstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="jhsstudentsfree">
                @forEach($zoos as $zoo)
                    @if($zoo->jhsstudents_price >= 0 && $zoo->jhsstudents_price < 500)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->jhsstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <!--esstudents-->
            <ul class="p-priceZoo" id="esstudents2thou">
                @forEach($zoos as $zoo)
                    @if($zoo->esstudents_price >= 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->esstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="esstudentsthou">
                @forEach($zoos as $zoo)
                    @if($zoo->esstudents_price >= 1000 && $zoo->esstudents_price < 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->esstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="esstudents5hund">
                @forEach($zoos as $zoo)
                    @if($zoo->esstudents_price >= 500 && $zoo->esstudents_price < 1000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->esstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="esstudentsfree">
                @forEach($zoos as $zoo)
                    @if($zoo->esstudents_price >= 0 && $zoo->esstudents_price < 500)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->esstudents_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <!--childr-->
            <ul class="p-priceZoo" id="childr2thou">
                @forEach($zoos as $zoo)
                    @if($zoo->children_price >= 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->children_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="childrthou">
                @forEach($zoos as $zoo)
                    @if($zoo->children_price >= 1000 && $zoo->children_price < 2000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->children_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="childr5hund">
                @forEach($zoos as $zoo)
                    @if($zoo->children_price >= 500 && $zoo->children_price < 1000)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->children_price }}</li>
                    @endif
                @endforeach
            </ul>
            
            <ul class="p-priceZoo" id="childrfree">
                @forEach($zoos as $zoo)
                    @if($zoo->children_price >= 0 && $zoo->children_price < 500)
                    <li class="p-priceZoo_item"><a href="/zoos/{{ $zoo->id }}">{{ $zoo->zoo_name }}/{{ $zoo->children_price }}</li>
                    @endif
                @endforeach
            </ul>
            
        
            
        </div>
        
        
    </div>
    
@endsection