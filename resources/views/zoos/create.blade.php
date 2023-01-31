@extends ('commons.origin')

@section('contents')
    
    <form action="/zoos" method="POST">
        @csrf

        <label for="zoo_name">動物園名</label>
        <br>
        <input type="text" name="zoo[zoo_name]" placeholder="動物園名" value="{{ old('zoo[zoo_name]') }}" required />
        <br>
        
        <label for="">紹介文</label>
        <br>
        <textarea name="zoo[caption]" required>{{ old('zoo[caption]') }}</textarea>
        <br>
        
        <label for="adress">住所</label>
        <br>
        <input type="text" name="zoo[adress]" value="{{ old('zoo[adress]') }}" required />
        <br>
        <select name="zoo[prefecture_id]" value="{{ old('zoo[prefecture_id]') }}" required >
            @foreach($prefectures as $prefecture)
                <option value="{{ old('zoo[prefecture_id]', $prefecture->id) }}" @if(isset($zoo->prefecture_id) && ($zoo->prefecture_id == $prefecture->id)  ) selected @endif>{{ $prefecture->prefecture }}</option>
                <!--<option value="{{ old('zoo[prefecture_id]', $prefecture->id) }}" selected>{{ $prefecture->prefecture }}</option>-->
            @endforeach
        </select>
        <br>
        
        <label for="url">ホームページURL</label>
        <br>
        <input type="url" name="zoo[hp_url]" value="{{ old('zoo[hp_url]') }}" required />
        <br>
        
        <style>
            .c-anmlChild {
                display: none;
            }
        </style>
        <div class="l-animal">
        @foreach($ani_rels as $animal_class)
            <details class="e-animal_class">
                <summary>{{ $animal_class->animal_class }}</summary>
                <ul class="e-animal_order">
                @foreach($animal_class->animal_orders as $animal_order)
                    <li>
                        <p class="c-anmlPrnt{{ $animal_order->id }}" id="anmlPrnt{{ $animal_order->id }}">{{ $animal_order->animal_order }}</p>
                        <ul class="e-animal_family">
                        @foreach($animal_order->animal_families as $animal_family)
                            <li id="anmlChild{{ $animal_family->id }}" class="c-anmlChild c-anmlPrnt{{ $animal_family->animal_order_id }}">
                                <input type="checkbox" name="animal_family[]" value="{{ $animal_family->id }}" class="" >{{ $animal_family->animal_family }}
                            </li>
                            
                        @endforeach
                        </ul>
                    </li>
                @endforeach
                </ul>
            </details>
        @endforeach
        </div>

        <br>
        
        <label for="adults_price">大人料金</label>
        <br>
        <input type="text" name="zoo[adults_price]" value="{{ old('zoo[adults_price]') }}" />
        <br>
        
        <label for="middle_price">中人料金</label>
        <br>
        <input type="text" name="zoo[middle_price]" value="{{ old('zoo[middle_price]') }}" />
        <br>
        
        <label for="children_price">こども料金</label>
        <br>
        <input type="text" name="zoo[children_price]" value="{{ old('zoo[children_price]') }}" />
        <br>
            
        <input type="submit" value="登録"/>
    </form>
    
    <div>
        <a href="/zoos" class="l-main__zoo__back">Zoos Archive</a>
    </div>
    
@endsection