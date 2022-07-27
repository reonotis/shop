<div class="selectShopDisplayArea" >
        <div class="" >
            @if(!empty(session()->get(SessionConst::SELECTABLE_SHOP)))
                現在選択中のショップ名 : {{ session()->get(SessionConst::SELECTED_SHOP)->shop_name }}
            @else
                ショップ : {{ session()->get(SessionConst::SELECTED_SHOP)->shop_name }}
            @endif

        </div>

        @if(!empty(session()->get(SessionConst::SELECTABLE_SHOP)))
            <div class="deselect" >
                <a href="{{ route('shop.deselect') }}" >他の店舗を選択する</a>
            </div>
        @endif
</div>

