@extends ('commons.origin')

@section('contents')

    <style>
        div .favabtn:nth-child(2){
            display: none;
        }
        .is_show{
            display: block!important;
        }
    </style>
    <div class="p-zooEach">
        @forEach($anmlfs as $anmlf)
            @if($anmlf->id == $id)
            <h2 class="c-zooTitle">{{ $anmlf->animal_family }}のいる動物園一覧</h2>
                @if (auth('web')->user() && $fava === null)
                <div>
                    <button data-anmlfid="{{$anmlf->id}}" data-userid="{{$user->id}}" data-fava="{{$fava}}"class="favabtn">いいね</button>
                    <button data-anmlfid="{{$anmlf->id}}" data-userid="{{$user->id}}" data-fava="0" style="color:red" class="favabtn">いいね</button>
                </div>
                
                @elseif(auth('web')->user() && $fava != null)
                <div>
                    <button data-anmlfid="{{$anmlf->id}}" data-userid="{{$user->id}}" data-fava="{{$fava}}" style="color:red" class="favabtn">いいね</button>
                    <button data-anmlfid="{{$anmlf->id}}" data-userid="{{$user->id}}" data-fava="1" class="favabtn">いいね</button>
                </div>
            
                @endif
            
            <ul>
                @forEach($anmlf->zoos as $zoo)
                <li class="p-zooEach_zoos"><a href="/zoos/{{$zoo->id}}">{{ $zoo->zoo_name }}</li>
                @endforeach
            </ul>
            @endif
        @endforeach
        
    </div>
    
@endsection