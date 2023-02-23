<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/myprofile">アカウント情報</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route("favzoo") }}">お気に入り動物園</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route("favanimal") }}">お気に入り動物</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/myposts/">MY投稿</a>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('ログアウト') }}
                            </x-dropdown-link>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
