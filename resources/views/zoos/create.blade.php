@extends ('commons.origin')

@section('contents')
    <div class="l-main">
        <div class="spMy spadmin l-side">
            <ul class="l-side_list">
                <li class="l-side_item"><a href="{{ route('admin.dashboard') }}">管理者ページTOP</a></li>
                <li class="l-side_item"><a href="{{ route('admin.archive') }}">アカウント情報</a></li>
                <li class="l-side_item"><a href="{{ route('zoo.archive') }}">動物園リスト</a></li>
            </ul>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <x-dropdown-link :href="route('admin.logout')" class="p-logout c-btn" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                </x-dropdown-link>
            </form>
        </div>
        
        <div class="l-content fzoo">
            
            <form class="p-fPost p-fZoo" action="{{ route('zoo.store') }}" method="POST">
                @csrf
            
                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="zoo_name">動物園名</label>
                    <input class="p-fZoo_input" type="text" name="zoo[zoo_name]" placeholder="動物園名" value="{{ old('zoo[zoo_name]') }}" required />
                </div>
                
                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="">紹介文</label>
                    <textarea class="p-fZoo_text" name="zoo[caption]" required>{{ old('zoo[caption]') }}</textarea>
                </div>
                
                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="adress">住所</label>
                    <input class="p-fZoo_select" type="text" name="zoo[adress]" value="{{ old('zoo[adress]') }}" required />
                    <select name="zoo[prefecture_id]" value="{{ old('zoo[prefecture_id]') }}" required >
                        @foreach($prefectures as $prefecture)
                            <option value="{{ old('zoo[prefecture_id]', $prefecture->id) }}" @if(isset($zoo->prefecture_id) && ($zoo->prefecture_id == $prefecture->id)  ) selected @endif>{{ $prefecture->prefecture }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="url">ホームページURL</label>
                    <input class="p-fZoo_input" type="url" name="zoo[hp_url]" value="{{ old('zoo[hp_url]') }}" required />
                </div>
            
                <div class="p-fZoo_wrap c-animal">
                @foreach($ani_rels as $animal_class)
                    <details class="p-fZoo_class c-animal_class">
                        <summary>{{ $animal_class->animal_class }}</summary>
                        <ul class="p-fZoo_order c-animal_order">
                        @foreach($animal_class->animal_orders as $animal_order)
                            <li class="p-fZoo_orderWrap">
                                <p class="p-fZoo_orderItem c-anmlPrnt" id="c-anmlPrnt{{ $animal_order->id }}">{{ $animal_order->animal_order }}</p>
                                <ul class="p-fZoo_family c-animal_family">
                                @foreach($animal_order->animal_families as $animal_family)
                                    <li id="anmlChild{{ $animal_family->id }}" class="p-fZoo_familyWrap c-anmlPrnt{{ $animal_family->animal_order_id }}">
                                        <input type="checkbox" name="animal_family[]" value="{{ $animal_family->id }}" class="p-fZoo_familyItem" >{{ $animal_family->animal_family }}
                                    </li>
                                    
                                @endforeach
                                </ul>
                            </li>
                        @endforeach
                        </ul>
                    </details>
                @endforeach
                </div>

                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="adults_price">シニア料金</label>
                    <input class="p-fZoo_input" type="text" name="zoo[seniors_price]" value="{{ old('zoo[seniors_price]') }}" />
                </div>
                
                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="adults_price">大人料金</label>
                    <input class="p-fZoo_input" type="text" name="zoo[adults_price]" value="{{ old('zoo[adults_price]') }}" />
                </div>
                
                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="middle_price">高校生料金</label>
                    <input class="p-fZoo_input" type="text" name="zoo[hsstudents_price]" value="{{ old('zoo[hsstudents_price]') }}" />
                </div>
                
                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="middle_price">中学生料金</label>
                    <input class="p-fZoo_input" type="text" name="zoo[jhsstudents_price]" value="{{ old('zoo[jhsstudents_price]') }}" />
                </div>
                
                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="middle_price">小学生料金</label>
                    <input class="p-fZoo_input" type="text" name="zoo[esstudents_price]" value="{{ old('zoo[esstudents_price]') }}" />
                </div>
                
                <div class="p-fZoo_wrap">
                    <label class="p-fZoo_label" for="children_price">こども料金</label>
                    <input class="p-fZoo_input" type="text" name="zoo[children_price]" value="{{ old('zoo[children_price]') }}" />
                </div>  
                    
                <div class="p-fZoo_wrap">
                    <input class="c-btn" type="submit" value="登録"/>
                </div>
            </form>
            
            <a href="{{ route('zoo.archive') }}" class="c-back">動物園リストへ戻る</a>

        </div>
    </div
    
@endsection