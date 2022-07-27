<x-shop.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Various Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    あなたの名前を設定してください

                    <form action="{{ route('shop.setting.nameSet') }}" method="post" >
                        @csrf
                        <input type="hidden" name="redirectUrl" value="{{ $redirectUrl }}" >
                        <input type="text" name="name" value="{{ Auth::user()->name }}" >
                        <button type="submit" class="submit register-btn">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-shop.app-layout>
