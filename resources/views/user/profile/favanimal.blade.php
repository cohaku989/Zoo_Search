@extends ('commons.origin')

@section('contents')

    <div class="l-main">
        <div class="l-side">
            <ul class="l-side_list">
                <li class="l-side_item"><a href="{{ route('dashboard') }}">マイページTOP</a></li>
                <li class="l-side_item"><a href="{{ route('profile.info') }}">アカウント情報</a></li>
                <li class="l-side_item"><a href="{{ route("favzoo") }}">お気に入り動物園</a></li>
                <li class="l-side_item"><a href="{{ route("favanimal") }}">お気に入り動物</a></li>
                <li class="l-side_item"><a href="{{ route("post.archive") }}">MY投稿</a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <x-dropdown-link :href="route('logout')" class="c-btn" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                </x-dropdown-link>
            </form>
        </div>
        <div class="l-content">
            <div class="p-profile">
                <h3 class="c-h3">お気に入りした動物</h3>
                <div class="l-archive">
                    <ul class="l-archive_list">
                        @foreach($favas as $fava)
                           <li class="l-archive_item animal"><a href="{{ route('zoo.each', $fava->animal_family->id) }}">{{ $fava->animal_family->animal_family }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{ route('dashboard') }}" class="c-back">
                    マイページへ戻る
                </a>
            </div>
        </div>
    </div>
@endsection