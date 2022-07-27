<x-admin.shop-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Shop Detail') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="w-2/3 mx-auto">

                <x-flash-message class="mb-4" />


                <div class="" >
                    <div class="shopShowTabs flex" >
                        <div class="shopShowTab active" >基本情報</div>
                        <div class="shopShowTab" >担当者情報</div>
                        <div class="shopShowTab" >商品情報</div>
                        <div class="shopShowTab" >売り上げ</div>
                        <div class="shopShowTab" >請求</div>
                    </div>
                    <div class="" >
                        <div class="shopShowDetail" >
                            <div class="shopDetailContainer flex">
                                <div class="shopDetailContainerTitle" >店舗名</div>
                                <div class="shopDetailContainerContents" >{{ $shop->shop_name }}</div>
                            </div>
                            <div class="shopDetailContainer flex">
                                <div class="shopDetailContainerTitle" >店舗メールアドレス</div>
                                <div class="shopDetailContainerContents" >{{ $shop->email }}</div>
                            </div>

                            <div class="flex">
                                <a href="{{ route('admin.shop.edit', ['shop' => $shop->id ]) }}" class="mx-auto" >
                                    <button type="submit" class="submit edit-btn" >編集</button>
                                </a>
                            </div>
                        </div>

                        <div class="shopShowDetail" style="display: none;" >
                            @if(count($shopStaffs))
                                <table class="shopShowStaffTable" >
                                    <tr>
                                        <th>名前</th>
                                        <th>メールアドレス</th>
                                    </tr>
                                    @foreach($shopStaffs as $staff)
                                        <tr>
                                            <td>{{ (!empty($staff->name)) ? $staff->name : '未設定'; }}</td>
                                            <td>{{ $staff->email }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif

                                <div class="flex">
                                    @if(count($shopStaffs))
                                        <a href="{{ route('admin.shop.edit', ['shop' => $shop->id ]) }}" class="mx-auto" >
                                            <button type="submit" class="submit edit-btn" >担当者編集</button>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.shop.staffCreate', ['shop' => $shop->id]) }}" class="mx-auto" >
                                        <button type="submit" class="submit register-btn" >担当者追加</button>
                                    </a>
                                </div>
                        </div>
                        <div class="shopShowDetail" style="display: none;" >商品情報</div>
                        <div class="shopShowDetail" style="display: none;" >売り上げ</div>
                        <div class="shopShowDetail" style="display: none;" >請求</div>
                    </div>
                </div>
                <div class="flex">
                    <a href="{{ route('admin.shop.list') }}" class="mx-auto" >
                        <button type="submit" class="submit back-btn" >リストに戻る</button>
                    </a>
                </div>

            </div>
        </div>
    </section>

</x-admin.shop-layout>
