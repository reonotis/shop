<x-admin.shop-layout>

    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Shop Management') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('admin.shop.create') }}" >
                        <h4 class="font-medium text-2xl text-gray-900">ショップ登録はこちら</h4>
                    </a>
                </div>

            </div>
            <div class="w-3/4 mx-auto" >
                {{ $shops->links() }}

                <table class="adminShopListTable" >
                    <tr>
                        <th>ショップ名</th>
                        <th></th>
                        <th>表示</th>
                    </tr>
                    @foreach ($shops as $shop)
                        <tr>
                            <td>{{ $shop->shop_name }}</td>
                            <td></td>
                            <td><a href="{{ route('admin.shop.show', ['shop'=>$shop->id]) }}" >表示</a></td>
                        </tr>
                    @endforeach
            </table>
            </div>
        </div>
    </section>

</x-admin.shop-layout>