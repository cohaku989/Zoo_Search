@extends ('commons.origin')

@section('contents')

    <div class="l-main__zoo">
        <div class="l-main__zoo__create">
            <a href="/zoos/create">Create</a>
        </div>
        
        @foreach($zoo as $a_zoo)
            <div class="zoo__list">
                <h3 class="zoo__title"><a href="/zoos/{{ $a_zoo->id }}">{{ $a_zoo->zoo_name }}</a></h3>
                <p class="zoo__text">{{ $a_zoo->caption }}</p>
            </div>
        @endforeach
        
    </div>
    
@endsection