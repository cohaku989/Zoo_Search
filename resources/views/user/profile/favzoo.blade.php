@extends ('commons.origin')

@section('contents')

    <div class="l-favzoo">
        <h3 class="c-title">お気に入りした動物園</h3>
        <ul class="c-list">
            @foreach($favzs as $favz)
               <li class="c-list_item"><a href="/zoos/{{ $favz->zoo->id }}">{{ $favz->zoo->zoo_name }}</a></li>
            @endforeach
        </ul>
        
    </div>
    
@endsection