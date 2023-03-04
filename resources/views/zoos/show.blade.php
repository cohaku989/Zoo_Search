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
        
        <div class="l-content p-pbtn">
             @if (auth('web')->user())
                @if( $favz === null )
                <div class="p-favzWrap">
                    <button data-zooid="{{$zoo->id}}" data-userid="{{$user->id}}" data-favz="{{$favz}}"class="unfavz favzbtn"></button>
                    <button data-zooid="{{$zoo->id}}" data-userid="{{$user->id}}" data-favz="0" class="favz favzbtn"></button>
                </div>
                
                @elseif($favz != null)
                <div class="p-favzWrap">
                    <button data-zooid="{{$zoo->id}}" data-userid="{{$user->id}}" data-favz="{{$favz}}" class="favz favzbtn"></button>
                    <button data-zooid="{{$zoo->id}}" data-userid="{{$user->id}}" data-favz="1" class="unfavz favzbtn"></button>
                </div>
                @endif
            
            @endif
            <div class="l-zoo">
                <h3 class="p-zooEach_name c-h3">{{ $zoo->zoo_name }}</h3>
                <div class="p-zooEach">
                    <p class="p-zooEach_label">概要</p>
                    <p class="p-zooEach_content">{{ $zoo->caption }}</p>
                </div>
                <div class="p-zooEach">
                    <p class="p-zooEach_label">住所</p>
                    <p class="p-zooEach_content">{{ $zoo->adress }}</p>
                </div>
                <div id="map" class="p-zoo_map" style="height:200px"></div>
                
                <div class="p-zooEach">
                    <p class="p-zooEach_label">動物情報</p>
                    <div class="p-zooEach_content">
                        @forEach($animals as $class)
                        <div class="p-zooCat">
                            <p class="p-zooCat_class">{{ $class->animal_class }}</P>
                            <ul class="p-zooCat_oWrap">
                                @forEach($class->animal_orders as $order)
                                <li class="p-zooCat_oList">
                                    <p class="p-zooCat_order">{{ $order->animal_order }}</p>
                                    <ul class="p-zooCat_fWrap">
                                        <li class="p-zooCat_ofamily">{{ $order->animal_order }}</li>
                                        @forEach($order->animal_families as $family)
                                            @forEach($zoo->animal_families as $zfamily)
                                            @if($family->id == $zfamily->id)
                                            <li class="p-zooCat_family">{{ $family->animal_family }}</li>
                                            @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="p-zooEach">
                    <p class="p-zooEach_label">動物園HP</p>
                    <div class="p-zooEach_content">
                        <a href="{{ $zoo->hp_url }}" class="p-zooEach_url">{{ $zoo->zoo_name }}のホームページ</a>
                    </div>
                </div>
                
                <div class="p-zooEach">
                    <p class="p-zooEach_label">入園料金</p>
                    <div class="p-zooEach_content">
                        <ul class="p-zooPrice">
                            <li class="p-zooPrice_wrap">
                                <p class="p-zooPrice_item"><span>シニア</span>{{ $zoo->seniors_price }}円</p>
                            </li>
                            <li class="p-zooPrice_wrap">
                                <p class="p-zooPrice_item"><span>大人</span>{{ $zoo->adults_price }}円</p>
                            </li>
                            <li class="p-zooPrice_wrap">
                                <p class="p-zooPrice_item"><span>高校生</span>{{ $zoo->hsstudents_price }}円</p>
                            </li>
                            <li class="p-zooPrice_wrap">
                                <p class="p-zooPrice_item"><span>中学生</span>{{ $zoo->jhsstudents_price }}円</p>
                            </li>
                            <li class="p-zooPrice_wrap">
                                <p class="p-zooPrice_item"><span>小学生</span>{{ $zoo->esstudents_price }}円</p>
                            </li>
                            <li class="p-zooPrice_wrap">
                                <p class="p-zooPrice_item"><span>小学生以下</span>{{ $zoo->children_price }}円</p>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
    
            @if(!auth('admin')->user())
            <a href="{{ $prevurl }}" class="c-back">前のページへ戻る</a>
            
            @elseif( auth('admin')->user() )
            <div class="p-each_user">
                <div class="p-each_btnWrap">
                    @if( $prevurl != route("zoo.edit", $zoo->id) && $prevurl != route("zoo.create") && $prevurl != route("zoo.archive") )
                    <a href="{{ $prevurl }}" class="c-back">前のページへ戻る</a>
                    @endif
                    <a href="{{ route('zoo.archive') }}" class="c-back">動物園リストへ戻る</a>
                </div>
               
                <div class="p-each_userSet">
                    <a class="c-btn" href="{{ route('zoo.edit', $zoo->id) }}">投稿を編集する</a>
                    <form action="{{ route('zoo.delete', $zoo->id) }}" id="form_{{ $zoo->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <butto class="c-btn" type="submit">投稿を削除する</button> 
                    </form>
                </div>
            </div>
            @endif 

        </div>
    </div>
    
    <!-- APIキーを指定してjsファイルを読み込む -->
        <script>
          let address = @json($zoo->adress);
        </script>
        
@endsection