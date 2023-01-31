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
            <p class="p-place_division" id="dHokkaido">北海道</p>
            <p class="p-place_division" id="dTohoku">東北地方</p>
            <p class="p-place_division" id="dKanto">関東地方</p>
            <p class="p-place_division" id="dChubu">中部地方</p>
            <p class="p-place_division" id="dKinki">近畿地方</p>
            <p class="p-place_division" id="dChugoku-Shikoku">中国・四国地方</p>
            <p class="p-place_division" id="dKyushu-Okinawa">九州・沖縄地方</p>
        </div>
        
        <div class="p-place_area">
            
            <div class="c-placeGroup" id="eHokkaido">
                <figure><img src="{{ secure_asset('/img/img-Hokkaido.svg')  }}" alt="北海道" width=700px></figure>
                
                @foreach($zoos as $zoo)
                <div class="c-placeEach">
                    <i class="fas fa-map-marker-alt"></i>
                    <a href="{{ $zoo->hp_url }}" class="c-place_zoo">{{ $zoo->zoo_name }}</a>
                </div>
                @endforeach
                
                <p class="back_map">Back</p>
                
            </div>
            
            <div class="l-place__area__point" id="dTohoku">
                <figure><img src="{{ secure_asset('/img/img-Tohoku.svg')  }}" alt="東北" width=700px></figure>
                
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                
                <p class="back_map">Back</p>
                
            </div>
            
            <div class="l-place__area__point" id="dKanto">
                <figure><img src="{{ secure_asset('/img/img-Kanto.svg')  }}" alt="関東" width=700px></figure>
                
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                
                <p class="back_map">Back</p>
                
            </div>
            
            <div class="l-place__area__point" id="dChubu">
                <figure><img src="{{ secure_asset('/img/img-Chubu.svg')  }}" alt="中部" width=700px></figure>
                
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                
                <p class="back_map">Back</p>
                
            </div>
            <div class="l-place__area__point" id="dKinki">
                <figure><img src="{{ secure_asset('/img/img-Kinki.svg')  }}" alt="近畿" width=700px></figure>
                
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                
                <p class="back_map">Back</p>
                
            </div>
            
            <div class="l-place__area__point" id="dChugoku-Shikoku">
                <figure><img src="{{ secure_asset('/img/img-Chugoku-Shikoku.svg')  }}" alt="中国・四国" width=700px></figure>
                
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                
                <p class="back_map">Back</p>
                
            </div>
            
            <div class="l-place__area__point" id="dKyushu-Okinawa">
                <figure><img src="{{ secure_asset('/img/img-Kyushu-Okinawa.svg')  }}" alt="九州・沖縄" width=700px></figure>
                
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                <div class="l-place__area__zoo">
                    <p></p>
                </div>
                
                <p class="back_map">Back</p>
                
            </div>
            
            
        </div>
    </div>
    
@endsection