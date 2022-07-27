<x-shop.app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Product Management') }}
        </h2>
    </x-slot>

    <x-flash-message class="mb-4" />
    <x-shop.selectshop class="mb-4" />

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="w-1/2 mx-auto">

                商品の画面です

            </div>
        </div>
    </section>

</x-shop.app-layout>
