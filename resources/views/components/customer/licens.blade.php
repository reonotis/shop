
@props(['licenses' => NULL ])

<section class="text-gray-600 py-2 w-full flex flex-wrap">
    <div class="customer-show-detail-licenses" >
        <div class="customer-show-detail-license" >
            <h2 class="font-medium text-xl w-full">ダイバーレベル・コース</h2>
            <div class="flex flex-wrap" >
                @foreach ($licenses as $license)
                    <div class="flex w-full" >
                        <div class="">{{ $license->license_name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="customer-show-detail-licenses" >
        <div class="customer-show-detail-license" >
            <h2 class="font-medium text-xl w-full">プロフェッショナル・コース</h2>
        </div>
    </div>
    <div class="customer-show-detail-licenses" >
        <div class="customer-show-detail-license" >
            <h2 class="font-medium text-xl w-full">テクニカル・コース</h2>
        </div>
    </div>
    <div class="customer-show-detail-licenses" >
        <div class="customer-show-detail-license" >
            <h2 class="font-medium text-xl w-full">フリーダイバー・コース</h2>
        </div>
    </div>
</section>