@extends ('commons.origin')

@section('contents')

    <nav class="p-nav">
        <ul class="">
            <li class="p-nav_list"><a href="#place">場所から探す</a></li>
            <li class="p-nav_list"><a href="/top_animals#animals">動物から探す</a></li>
            <li c="p-nav_list"><a href="/top_price#price">料金から探す</a></li>
        </ul>
    </nav>
            
    <div class="p-place">
        <div class="p-place_all" id="all">
            <img src="{{ secure_asset('/img/img-map.svg')  }}" alt="日本地図" width=700px>
            <p class="p-place_division" id="dHokkaido" onclick="clickFn(this.id)">北海道</p>
            <p class="p-place_division" id="dTohoku" onclick="clickFn(this.id)">東北地方</p>
            <p class="p-place_division" id="dKanto" onclick="clickFn(this.id)">関東地方</p>
            <p class="p-place_division" id="dChubu" onclick="clickFn(this.id)">中部地方</p>
            <p class="p-place_division" id="dKinki" onclick="clickFn(this.id)">近畿地方</p>
            <p class="p-place_division" id="dChugoku-Shikoku" onclick="clickFn(this.id)">中国・四国地方</p>
            <p class="p-place_division" id="dKyushu-Okinawa" onclick="clickFn(this.id)">九州・沖縄地方</p>
        </div>
        
        <div class="p-place_area">
            
            <div class="c-placeGroup" id="eHokkaido">
                <figure><img src="{{ secure_asset('/img/img-Hokkaido.svg')  }}" alt="北海道" width=700px></figure>
                
                @foreach($zoos as $zoo)
                    @if($zoo->prefecture_id == 1)
                    <div class="c-placeEach">
                        <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                        <a href="/zoos/{{$zoo->id}}" class="c-place_zoo">{{ $zoo->zoo_name }}</a>
                    </div>
                    @endif
                @endforeach
                
                <p class="back_map" id="bHokkaido" onclick="backFn(this.id)">Back</p>
                
            </div>
            
            <div class="c-placeGroup" id="eTohoku">
                <figure><img src="{{ secure_asset('/img/img-Tohoku.svg')  }}" alt="東北" width=700px></figure>
                
                @foreach($zoos as $zoo)
                    @if($zoo->prefecture_id >= 2 && $zoo->prefecture_id <= 7 )
                    <div class="c-placeEach">
                        <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                        <a href="/zoos/{{$zoo->id}}" class="c-place_zoo">{{ $zoo->zoo_name }}</a>
                    </div>
                    @endif
                @endforeach
                
                <p class="back_map" id="bTohoku" onclick="backFn(this.id)">Back</p>
                
            </div>
            
            <div class="c-placeGroup" id="eKanto">
                <figure><img src="{{ secure_asset('/img/img-Kanto.svg')  }}" alt="関東" width=700px></figure>
                
                @foreach($zoos as $zoo)
                    @if($zoo->prefecture_id >= 8 && $zoo->prefecture_id <= 14 )
                    <div class="c-placeEach">
                        <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                        <a href="/zoos/{{$zoo->id}}" class="c-place_zoo">{{ $zoo->zoo_name }}</a>
                    </div>
                    @endif
                @endforeach
                
                <p class="back_map" id="bKanto" onclick="backFn(this.id)">Back</p>
                
            </div>
            
            <div class="c-placeGroup" id="eChubu">
                <figure><img src="{{ secure_asset('/img/img-Chubu.svg')  }}" alt="中部" width=700px></figure>
                
                @foreach($zoos as $zoo)
                    @if($zoo->prefecture_id >= 15 && $zoo->prefecture_id <= 23 )
                    <div class="c-placeEach">
                        <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                        <a href="/zoos/{{$zoo->id}}" class="c-place_zoo">{{ $zoo->zoo_name }}</a>
                    </div>
                    @endif
                @endforeach
                
                <p class="back_map" id="bChubu" onclick="backFn(this.id)">Back</p>
                
            </div>
            <div class="c-placeGroup" id="eKinki">
                <figure><img src="{{ secure_asset('/img/img-Kinki.svg')  }}" alt="近畿" width=700px></figure>
                
                @foreach($zoos as $zoo)
                    @if($zoo->prefecture_id >= 24 && $zoo->prefecture_id <= 30 )
                    <div class="c-placeEach">
                        <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                        <a href="/zoos/{{$zoo->id}}" class="c-place_zoo">{{ $zoo->zoo_name }}</a>
                    </div>
                    @endif
                @endforeach
                
                <p class="back_map" id="bKinki" onclick="backFn(this.id)">Back</p>
                
            </div>
            
            <div class="c-placeGroup" id="eChugoku-Shikoku">
                <figure><img src="{{ secure_asset('/img/img-Chugoku-Shikoku.svg')  }}" alt="中国・四国" width=700px></figure>
                
                @foreach($zoos as $zoo)
                    @if($zoo->prefecture_id >= 31 && $zoo->prefecture_id <= 39 )
                    <div class="c-placeEach">
                        <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                        <a href="/zoos/{{$zoo->id}}" class="c-place_zoo">{{ $zoo->zoo_name }}</a>
                    </div>
                    @endif
                @endforeach
                
                <p class="back_map" id="bChugoku-Shikoku" onclick="backFn(this.id)">Back</p>
                
            </div>
            
            <div class="c-placeGroup" id="eKyushu-Okinawa">
                <figure><img src="{{ secure_asset('/img/img-Kyushu-Okinawa.svg')  }}" alt="九州・沖縄" width=700px></figure>
                
                @foreach($zoos as $zoo)
                    @if($zoo->prefecture_id >= 40 && $zoo->prefecture_id <= 47 )
                    <div class="c-placeEach">
                        <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                        <a href="/zoos/{{$zoo->id}}" class="c-place_zoo">{{ $zoo->zoo_name }}</a>
                    </div>
                    @endif
                @endforeach
                
                <p class="back_map"id="bKyushu-Okinawa" onclick="backFn(this.id)" >Back</p>
                
            </div>
            
            
        </div>
    </div>
    
@endsection