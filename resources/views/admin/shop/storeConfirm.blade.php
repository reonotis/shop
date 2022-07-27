<x-admin.shop-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Shop Create') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="w-1/2 mx-auto">

                <x-flash-message class="mb-4" />

                <div class="shopCreateSection" >
                    <h3>店舗情報</h3>
                    <div class="input-label-container">
                        <div class="" >店舗名</div>
                        <div class="" >{{ $request->shop_name }}</div>
                    </div>
                    <div class="input-label-container">
                        <div class="" >店舗メールアドレス</div>
                        <div class="" >{{ $request->shop_mail_address }}</div>
                    </div>
                </div>
                <div class="shopCreateSection" >
                    <h3>担当者情報</h3>
                    <div class="input-label-container">
                        <div class="" >担当者メールアドレス</div>
                        <div class="" >{{ $request->staff_mail_address }}</div>
                    </div>
                </div>
                <form method="post" action="{{ route('admin.shop.store') }}" >
                    <div class="">
                        @csrf
                        <input type="hidden" name="shop_name" value="{{ $request->shop_name }}" >
                        <input type="hidden" name="shop_mail_address" value="{{ $request->shop_mail_address }}" >
                        <input type="hidden" name="staff_mail_address" value="{{ $request->staff_mail_address }}" >
                        <input type="submit" value="登録" class="register-btn" >
                    </div>
                </form>

            </div>
        </div>
    </section>

</x-admin.shop-layout>
