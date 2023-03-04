@extends ('commons.origin')

@section('contents')
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
            <li class="p-top_tabItem is_tabActive"><a href="{{ route("search.place") }}">場所から探す</a></li>
            <li class="p-top_tabItem"><a href="{{ route("search.animal") }}">動物から探す</a></li>
            <li class="p-top_tabItem"><a href="{{ route("search.price") }}">料金から探す</a></li>
        </ul>
            <div class="p-place l-topContent">
                <div class="p-place_all" id="all">
                    <figure class="p-place_img">
                        <img src="{{ secure_asset('/img/img-map.svg')  }}" alt="日本地図" width=700px>
                    </figure>
                    <div class="p-place_division" id="dHokkaido" onclick="clickFn(this.id)">
                        <p class="p-place_divisionLabel">北海道</p>
                    </div>
                    <div class="p-place_division" id="dTohoku" onclick="clickFn(this.id)">
                        <p class="p-place_divisionLabel">東北地方</p>
                    </div>
                    <div class="p-place_division" id="dKanto" onclick="clickFn(this.id)">
                        <p class="p-place_divisionLabel">関東地方</p>
                    </div>
                    <div class="p-place_division" id="dChubu" onclick="clickFn(this.id)">
                        <p class="p-place_divisionLabel">中部地方</p>
                    </div>
                    <div class="p-place_division" id="dKinki" onclick="clickFn(this.id)">
                        <p class="p-place_divisionLabel">近畿地方</p>
                    </div>
                    <div class="p-place_division" id="dChugoku-Shikoku" onclick="clickFn(this.id)">
                        <p class="p-place_divisionLabel">中国・四国地方</p>
                    </div>
                    <div class="p-place_division" id="dKyushu-Okinawa" onclick="clickFn(this.id)">
                        <p class="p-place_divisionLabel">九州・沖縄地方</p>
                    </div>
                </div>
                
                <div class="p-place_area">
                    
                    <div class="c-place_group" id="eHokkaido">
                        <figure class="c-place_img"><img src="{{ secure_asset('/img/img-Hokkaido.svg')  }}" alt="北海道" width=700px></figure>
                        
                        @foreach($zoos as $zoo)
                            @if($zoo->prefecture_id == 1)
                            <div class="c-place_each position{{$zoo->id}}">
                                <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                                <a href="{{ route("zoo.show", $zoo->id)}}" class="c-place_zoo"><i class="far fa-arrow-alt-circle-right"></i>{{ $zoo->zoo_name }}</a>
                            </div>
                            @endif
                        @endforeach
                        
                        <p class="c-back" id="bHokkaido" onclick="backFn(this.id)">戻る</p>
                        
                    </div>
                    
                    <div class="c-place_group" id="eTohoku">
                        <figure class="c-place_img">
                            <img src="{{ secure_asset('/img/img-Tohoku.svg')  }}" alt="東北" width=700px>
                        </figure>
                        
                        @foreach($zoos as $zoo)
                            @if($zoo->prefecture_id >= 2 && $zoo->prefecture_id <= 7 )
                            <div class="c-place_each position{{$zoo->id}}">
                                <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                                <a href="{{ route("zoo.show", $zoo->id) }}" class="c-place_zoo"><i class="far fa-arrow-alt-circle-right"></i>{{ $zoo->zoo_name }}</a>
                            </div>
                            @endif
                        @endforeach
                        
                        <p class="c-back" id="bTohoku" onclick="backFn(this.id)">戻る</p>
                        
                    </div>
                    
                    <div class="c-place_group" id="eKanto">
                        <figure class="c-place_img">
                            <img src="{{ secure_asset('/img/img-Kanto.svg')  }}" alt="関東" width=700px>
                        </figure>
                        
                        @foreach($zoos as $zoo)
                            @if($zoo->prefecture_id >= 8 && $zoo->prefecture_id <= 14 )
                            <div class="c-place_each position{{$zoo->id}}">
                                <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                                <a href="{{ route("zoo.show", $zoo->id) }}" class="c-place_zoo"><i class="far fa-arrow-alt-circle-right"></i>{{ $zoo->zoo_name }}</a>
                            </div>
                            @endif
                        @endforeach
                        
                        <p class="c-back" id="bKanto" onclick="backFn(this.id)">戻る</p>
                        
                    </div>
                    
                    <div class="c-place_group" id="eChubu">
                        <figure class="c-place_img">
                            <img src="{{ secure_asset('/img/img-Chubu.svg')  }}" alt="中部" width=700px>
                        </figure>
                        
                        @foreach($zoos as $zoo)
                            @if($zoo->prefecture_id >= 15 && $zoo->prefecture_id <= 23 )
                            <div class="c-place_each position{{$zoo->id}}">
                                <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                                <a href="{{ route("zoo.show", $zoo->id) }}" class="c-place_zoo"><i class="far fa-arrow-alt-circle-right"></i>{{ $zoo->zoo_name }}</a>
                            </div>
                            @endif
                        @endforeach
                        
                        <p class="c-back" id="bChubu" onclick="backFn(this.id)">戻る</p>
                        
                    </div>
                    <div class="c-place_group" id="eKinki">
                        <figure class="c-place_img">
                            <img src="{{ secure_asset('/img/img-Kinki.svg')  }}" alt="近畿" width=700px>
                        </figure>
                        
                        @foreach($zoos as $zoo)
                            @if($zoo->prefecture_id >= 24 && $zoo->prefecture_id <= 30 )
                            <div class="c-place_each position{{$zoo->id}}">
                                <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                                <a href="{{ route("zoo.show", $zoo->id) }}" class="c-place_zoo"><i class="far fa-arrow-alt-circle-right"></i>{{ $zoo->zoo_name }}</a>
                            </div>
                            @endif
                        @endforeach
                        
                        <p class="c-back" id="bKinki" onclick="backFn(this.id)">戻る</p>
                        
                    </div>
                    
                    <div class="c-place_group" id="eChugoku-Shikoku">
                        <figure class="c-place_img">
                            <img src="{{ secure_asset('/img/img-Chugoku-Shikoku.svg')  }}" alt="中国・四国" width=700px>
                        </figure>
                        
                        @foreach($zoos as $zoo)
                            @if($zoo->prefecture_id >= 31 && $zoo->prefecture_id <= 39 )
                            <div class="c-place_each position{{$zoo->id}}">
                                <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                                <a href="{{ route("zoo.show", $zoo->id) }}" class="c-place_zoo"><i class="far fa-arrow-alt-circle-right"></i>{{ $zoo->zoo_name }}</a>
                            </div>
                            @endif
                        @endforeach
                        
                        <p class="c-back" id="bChugoku-Shikoku" onclick="backFn(this.id)">戻る</p>
                        
                    </div>
                    
                    <div class="c-place_group" id="eKyushu-Okinawa">
                        <figure class="c-place_img">
                            <img src="{{ secure_asset('/img/img-Kyushu-Okinawa.svg')  }}" alt="九州・沖縄" width=700px>
                        </figure>
                        
                        @foreach($zoos as $zoo)
                            @if($zoo->prefecture_id >= 40 && $zoo->prefecture_id <= 47 )
                            <div class="c-place_each position{{$zoo->id}}">
                                <i class="fas fa-map-marker-alt" onclick="zooFn(this)"></i>
                                <a href="{{ route("zoo.show", $zoo->id) }}" class="c-place_zoo"><i class="far fa-arrow-alt-circle-right"></i>{{ $zoo->zoo_name }}</a>
                            </div>
                            @endif
                        @endforeach
                        
                        <p class="c-back"id="bKyushu-Okinawa" onclick="backFn(this.id)" >戻る</p>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection