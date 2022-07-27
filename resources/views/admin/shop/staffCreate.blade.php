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

                <form method="post" action="{{ route('admin.shop.staffStoreConfirm'); }}" >
                    @csrf
                    <div class="shopCreateSection" >
                        <h3>{{ $shop->shop_name }}の担当者追加</h3>
                        <div class="input-label-container">
                            <input type="email" name="staff_mail_address" id="staff_mail_address" class="input-control" value="{{ old('staff_mail_address') }}" placeholder=" " required>
                            <label class="input-label" for="staff_mail_address">担当者メールアドレス</label>
                        </div>
                    </div>
                    <div class="flex">
                        <input type="hidden" name="shop_id" value="{{ $shop->id }}" >
                        <input type="submit" value="確認" class="register-btn" >
                    </div>
                </form>


            </div>
        </div>
    </section>

</x-admin.shop-layout>
