@extends ('commons.origin')

@section('contents')

    <div class="l-profile">
        <h3 class="c-title">マイページ</h3>
        <div class="c-list">
            <a href="/adminprofile/name/edit" >
                <ul class="e-listItem">
                    <li>名前</li>
                    <li>{{ $admin->name }}</li>
                </ul>
            </a>
            <a href="/adminprofile/email/edit" >
                <ul class="e-listItem">
                    <li>登録されたメールアドレス</li>
                    <li>{{ $admin->email }}</li>
                </ul>
            </a>
            
            <!--<a href="">パスワード変更</a>-->
        </div>
        
    </div>
    
@endsection