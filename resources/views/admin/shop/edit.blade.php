<x-admin.shop-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Shop Edit') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="w-1/2 mx-auto">

                <x-flash-message class="mb-4" />

                <form method="post" action="{{ route('admin.shop.storeConfirm'); }}" >
                    @csrf
                    <div class="shopCreateSection" >
                        <h3>店舗情報</h3>
                        <div class="input-label-container">
                            <input type="text" name="shop_name" id="shop_name" class="input-control" value="{{ (old('shop_name')) ? old('shop_name') : $shop->shop_name; }}" placeholder=" " required>
                            <label class="input-label" for="shop_name">店舗名</label>
                        </div>
                        <div class="input-label-container">
                            <input type="email" name="shop_mail_address" id="shop_mail_address" class="input-control" value="{{ (old('shop_mail_address')) ? old('shop_mail_address') : $shop->email; }}" placeholder=" " required>
                            <label class="input-label" for="shop_mail_address">店舗メールアドレス</label>
                        </div>
                    </div>
                    <div class="shopCreateSection" >
                        <h3>担当者情報</h3>
                        <div class="input-label-container">
                            <input type="email" name="staff_mail_address" id="staff_mail_address" class="input-control" value="{{ (old('staff_mail_address')) ? old('staff_mail_address') : ''; }}" placeholder=" " required>
                            <label class="input-label" for="staff_mail_address">担当者メールアドレス</label>
                        </div>
                    </div>
                    <div class="flex">
                        <input type="submit" value="確認" class="register-btn" >
                    </div>
                </form>


            </div>
        </div>
    </section>

</x-admin.shop-layout>
