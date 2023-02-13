@extends ('commons.origin')

@section('contents')

    <div class="l-favanimal">
        <h3 class="c-title">お気に入りした動物</h3>
        <ul class="c-list">
            @foreach($favas as $fava)
               <li class="c-list_item"><a href="/zoos/each/{{ $fava->animal_family->id }}">{{ $fava->animal_family->animal_family }}</a></li>
            @endforeach
        </ul>
        
    </div>
    
@endsection