@extends ('commons.origin')

@section('contents')

    <form action="/adminprofile" method="POST" class="l-profile">
        @csrf
        @method('PUT')
        
        @if( $link == "name")
            <label for="">名前を変更</label>
            <br>
            <input type="text" name="name" value="{{ $admin->name }}">
            <br>
            
            <input type="submit" value="更新"/>
            
        @elseif( $link == "email" )
            <label for="">メールアドレスを変更</label>
            <br>
            <input type="text" name="email" value="{{ $admin->email }}">
            <br>
            
            <input type="submit" value="更新"/>
            
        @endif
    </form>
    
    <div>
        <a href="/adminprofile" class="c-btnBack">マイページ</a>
    </div>
    
@endsection