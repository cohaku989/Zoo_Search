@extends ('commons.origin')

@section('contents')

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
            <li class="c-zoo_adult">{{ $zoo->adults_price }}</li>
            <li class="c-zoo_middle">{{ $zoo->middle_price }}</li>
            <li class="c-zoo_children">{{ $zoo->children_price }}</li>
        </ul>
        
    </div>
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
    <!-- APIキーを指定してjsファイルを読み込む -->
        <script>
          let address = @json($zoo->adress);
        </script>
        
@endsection