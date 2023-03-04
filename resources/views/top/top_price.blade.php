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
            <li class="p-top_tabItem"><a href="{{ route("search.place") }}">場所から探す</a></li>
            <li class="p-top_tabItem"><a href="{{ route("search.animal") }}">動物から探す</a></li>
            <li class="p-top_tabItem is_tabActive"><a href="{{ route("search.price") }}">料金から探す</a></li>
        </ul>
        <div class="p-price l-topContent">
            <div class="p-price_btnWrap">
                <p class="p-price_btnLabel">年代別</p>
                <ul class="p-priceAge">
                    <li class="p-priceAge_item" id="seniors">シニア</li>
                    <li class="p-priceAge_item" id="adults">大人</li>
                    <li class="p-priceAge_item" id="hsstudents">高校生</li>
                    <li class="p-priceAge_item" id="jhsstudents">中学生</li>
                    <li class="p-priceAge_item" id="esstudents">小学生</li>
                    <li class="p-priceAge_item" id="childr">こども</li>
                </ul>
                <ul class="p-priceEach" id="p-priceEach">
                    <li class="p-price_btnLabel">料金で絞り込む</li>
                    <li class="p-priceEach_item" id="2thou">¥2000~</li>
                    <li class="p-priceEach_item" id="thou">¥500~¥1000</li>
                    <li class="p-priceEach_item" id="5hund">~¥500</li>
                    <li class="p-priceEach_item" id="free">無料</li>
                </ul>
            </div>
            
            <div class="">
                <!--price-->
                <ul class="p-priceZoo" id="senior">
                    @forEach($zoos as $zoo)
                    <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $zoo->id) }}">{{ $zoo->zoo_name }}｜{{ $zoo->seniors_price }}円</a></li>
                    @endforeach
                </ul>
                
                <ul class="p-priceZoo" id="hsstudent">
                    @forEach($zoos as $zoo)
                    <li class="p-priceZoo_item">
                        <a href="{{ route('zoo.show', $zoo->id) }}">{{ $zoo->zoo_name }}｜{{ $zoo->hsstudents_price }}円</a></li>
                    @endforeach
                </ul>
                
                <ul class="p-priceZoo" id="adult">
                    @forEach($zoos as $zoo)
                    <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $zoo->id) }}">{{ $zoo->zoo_name }}｜{{ $zoo->adults_price }}円</a></li>
                    @endforeach
                </ul>
                
                <ul class="p-priceZoo" id="jhsstudent">
                    @forEach($zoos as $zoo)
                    <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $zoo->id) }}">{{ $zoo->zoo_name }}｜{{ $zoo->jhsstudents_price }}円</a></li>
                    @endforeach
                </ul>
                
                <ul class="p-priceZoo" id="esstudent">
                    @forEach($zoos as $zoo)
                    <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $zoo->id) }}">{{ $zoo->zoo_name }}｜{{ $zoo->esstudents_price }}円</a></li>
                    @endforeach
                </ul>
                
                <ul class="p-priceZoo" id="child">
                    @forEach($zoos as $zoo)
                    <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $zoo->id) }}">{{ $zoo->zoo_name }}｜{{ $zoo->children_price }}円</a></li>
                    @endforeach
                </ul>
                
                
            <!--age-price-->
            
            <!--senior-->
                <ul class="p-priceZoo" id="seniors2thou">
                    @if($ss2tho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($ss2tho as $s2tho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $s2tho->id) }}">{{ $s2tho->zoo_name }}｜{{ $s2tho->seniors_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="seniorsthou">
                    @if($sstho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($sstho as $stho)
                        <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $stho->id) }}">{{ $stho->zoo_name }}｜{{ $stho->seniors_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="seniors5hund">
                    @if($ss5hun->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($ss5hun as $s5hun)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $s5hun->id) }}">{{ $s5hun->zoo_name }}｜{{ $s5hun->seniors_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="seniorsfree">
                    @if($ssfree->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($ssfree as $sfree)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $sfree->id) }}">{{ $sfree->zoo_name }}｜{{ $sfree->seniors_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <!--adults-->
                <ul class="p-priceZoo" id="adults2thou">
                    @if($as2tho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($as2tho as $a2tho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $a2tho->id) }}">{{ $a2tho->zoo_name }}｜{{ $a2tho->adults_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="adultsthou">
                    @if($astho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($astho as $atho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $atho->id) }}">{{ $atho->zoo_name }}｜{{ $atho->adults_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="adults5hund">
                    @if($as5hun->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($as5hun as $a5hun)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $a5hun->id) }}">{{ $a5hun->zoo_name }}｜{{ $a5hun->adults_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="adultsfree">
                    @if($asfree->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($asfree as $afree)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $afree->id) }}">{{ $afree->zoo_name }}｜{{ $afree->adults_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <!--hsstudents-->
                <ul class="p-priceZoo" id="hsstudents2thou">
                    @if($hs2tho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($hs2tho as $h2tho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $h2tho->id) }}">{{ $h2tho->zoo_name }}｜{{ $h2tho->hsstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="hsstudentsthou">
                    @if($hstho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($hstho as $htho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $htho->id) }}">{{ $htho->zoo_name }}｜{{ $htho->hsstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="hsstudents5hund">
                    @if($hs5hun->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($hs5hun as $h5hun)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $h5hun->id) }}">{{ $h5hun->zoo_name }}｜{{ $h5hun->hsstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="hsstudentsfree">
                    @if($hsfree->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($hsfree as $h2free)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $h2free->id) }}">{{ $h2free->zoo_name }}｜{{ $h2free->hsstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <!--jhsstudents-->
                <ul class="p-priceZoo" id="jhsstudents2thou">
                    @if($js2tho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($js2tho as $h2tho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $j2tho->id) }}">{{ $j2tho->zoo_name }}｜{{ $j2tho->jhsstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="jhsstudentsthou">
                    @if($jstho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($jstho as $jtho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $jtho->id) }}">{{ $jtho->zoo_name }}｜{{ $jtho->jhsstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="jhsstudents5hund">
                    @if($js5hun->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($js5hun as $j5hun)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $j5hun->id) }}">{{ $j5hun->zoo_name }}｜{{ $j5hun->jhsstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="jhsstudentsfree">
                    @if($jsfree->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($jsfree as $jfree)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $jfree->id) }}">{{ $jfree->zoo_name }}｜{{ $jfree->jhsstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <!--esstudents-->
                <ul class="p-priceZoo" id="esstudents2thou">
                    @if($es2tho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($es2tho as $e2tho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $e2tho->id) }}">{{ $e2tho->zoo_name }}｜{{ $e2tho->esstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="esstudentsthou">
                    @if($estho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($estho as $etho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $etho->id) }}">{{ $etho->zoo_name }}｜{{ $etho->esstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="esstudents5hund">
                    @if($es5hun->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($es5hun as $e5hun)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $e5hun->id) }}">{{ $e5hun->zoo_name }}｜{{ $e5hun->esstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="esstudentsfree">
                    @if($esfree->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($esfree as $efree)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $efree->id) }}">{{ $efree->zoo_name }}｜{{ $efree->esstudents_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <!--childr-->
                <ul class="p-priceZoo" id="childr2thou">
                    @if($cr2tho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($cr2tho as $c2tho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $c2tho->id) }}">{{ $c2tho->zoo_name }}｜{{ $c2tho->children_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="childrthou">
                    @if($crtho->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($crtho as $ctho)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $ctho->id) }}">{{ $ctho->zoo_name }}｜{{ $ctho->children_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="childr5hund">
                    @if($cr5hun->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($cr5hun as $c5hun)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $c5hun->id) }}">{{ $c5hun->zoo_name }}｜{{ $c5hun->children_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
                
                <ul class="p-priceZoo" id="childrfree">
                    @if($crfree->isEmpty())
                        <p>該当する料金の動物園がありません。</p>
                    @else
                        @forEach($crfree as $cfree)
                            <li class="p-priceZoo_item"><a href="{{ route('zoo.show', $cfree->id) }}">{{ $cfree->zoo_name }}｜{{ $cfree->children_price }}円</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            
        </div>
    </div>
</div>
    
@endsection