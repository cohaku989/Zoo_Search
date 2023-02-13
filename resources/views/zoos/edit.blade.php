@extends ('commons.origin')

@section('contents')
    
    <form action="/zoos/{{ $zoo->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <br>
        <label for="zoo_name">動物園名</label>
        <br>
        <input type="text" name="zoo[zoo_name]" placeholder="動物園名" value="@if($zoo->zoo_name){{ $zoo->zoo_name }} @else {{ old('zoo[zoo_name]') }} @endif" required />
        <br>
        
        <label for="">紹介文</label>
        <br>
        <textarea name="zoo[caption]" required>@if($zoo->caption){{$zoo->caption}}  @else{{ old('zoo[caption]') }} @endif</textarea>
        <br>
        
        <label for="adress">住所</label>
        <br>
        <input type="text" name="zoo[adress]" value="@if($zoo->adress){{$zoo->adress}} @else{{ old('zoo[adress]') }} @endif" required />
        <br>
        <select name="zoo[prefecture_id]" value="{{ old('zoo[prefecture_id]') }}" required >
            @foreach($prefectures as $prefecture)
                <option value="{{ old('zoo[prefecture_id]', $prefecture->id) }}" @if(isset($zoo->prefecture_id) && ($zoo->prefecture_id == $prefecture->id)  ) selected @endif>{{ $prefecture->prefecture }}</option>
            @endforeach
        </select>
        <br>
        
        <label for="url">ホームページURL</label>
        <br>
        <input type="url" name="zoo[hp_url]" value="@if($zoo->hp_url){{$zoo->hp_url }} @else{{ old('zoo[hp_url]') }} @endif" required />
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
                                
                                <input type="checkbox" name="animal_family[]" value="{{ $animal_family->id }}" 
                                    @foreach($checked as $check) @if($check->id == $animal_family->id) checked @endif @endforeach
                                class="">{{ $animal_family->animal_family }}
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
        
        <label for="adults_price">シニア料金</label>
        <br>
        <input type="text" name="zoo[seniors_price]" value="{{ old('zoo[seniors_price]') }}" />
        <br>
        <label for="adults_price">大人料金</label>
        <br>
        <input type="text" name="zoo[adults_price]" value="{{ old('zoo[adults_price]') }}" />
        <br>
        
        <label for="middle_price">高校生料金</label>
        <br>
        <input type="text" name="zoo[hsstudents_price]" value="{{ old('zoo[hsstudents_price]') }}" />
        <br>
        
        <label for="middle_price">中学生料金</label>
        <br>
        <input type="text" name="zoo[jhsstudents_price]" value="{{ old('zoo[jhsstudents_price]') }}" />
        <br>
        
        <label for="middle_price">小学生料金</label>
        <br>
        <input type="text" name="zoo[esstudents_price]" value="{{ old('zoo[esstudents_price]') }}" />
        <br>
        
        <label for="children_price">こども料金</label>
        <br>
        <input type="text" name="zoo[children_price]" value="{{ old('zoo[children_price]') }}" />
        <br>
        <input type="submit" value="更新"/>
    </form>
    
    <div>
        <a href="/zoos/{{ $zoo->id }}" class="c-zoo_back">Zoo</a>
    </div>
    
@endsection