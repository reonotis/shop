<x-shop.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MY Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-flash-message class="mb-4" />

                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex" >
                        @foreach ($shops as $shop)
                            <div class="selectShopContents" >
                                <a href="{{ route('shop.selecting', ['shop' => $shop->id ]) }}" >
                                        <div class="selectShopName" >{{ $shop->shop_name }}</div>
                                        <div class="selectShopImg" >image</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-shop.app-layout>
