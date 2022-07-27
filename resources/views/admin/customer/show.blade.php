@inject('myFunc', 'App\Libs\MyFunction')
<x-customer-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="-my-8 divide-y-2 divide-gray-100">
                            <div class="py-8 flex flex-wrap md:flex-nowrap">
                                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col border-solid mr-4 rounded-lg bg-blue-50 p-4" >
                                    <span class="font-semibold {{ $myFunc->viewSexClass($customer->sex) }}">{{ $customer->f_name . ' ' . $customer->l_name }} 様 {{ $myFunc->viewSexSymbol($customer->sex) }}</span>
                                </div>
                                <div class="md:flex-grow rounded-lg bg-blue-50 p-4">
                                    <div class="flex w-full px-4" >
                                        <div class="customer-show-tab text-blue-500" >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="customer-show-tab-logo" >
                                                <path d="M144.3 32.04C106.9 31.29 63.7 41.44 18.6 61.29c-11.42 5.026-18.6 16.67-18.6 29.15l0 357.6c0 11.55 11.99 19.55 22.45 14.65c126.3-59.14 219.8 11 223.8 14.01C249.1 478.9 252.5 480 256 480c12.4 0 16-11.38 16-15.98V80.04c0-5.203-2.531-10.08-6.781-13.08C263.3 65.58 216.7 33.35 144.3 32.04zM557.4 61.29c-45.11-19.79-88.48-29.61-125.7-29.26c-72.44 1.312-118.1 33.55-120.9 34.92C306.5 69.96 304 74.83 304 80.04v383.1C304 468.4 307.5 480 320 480c3.484 0 6.938-1.125 9.781-3.328c3.925-3.018 97.44-73.16 223.8-14c10.46 4.896 22.45-3.105 22.45-14.65l.0001-357.6C575.1 77.97 568.8 66.31 557.4 61.29z"/>
                                            </svg>
                                            <span class="customer-show-tab-text" >ログ</span>
                                        </div>
                                        <div class="customer-show-tab text-blue-500" >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="customer-show-tab-logo" >
                                                <path d="M640 162.8c0 6.917-2.293 13.88-7.012 19.7l-49.96 61.63c-6.32 7.796-15.62 11.85-25.01 11.85c-7.01 0-14.07-2.262-19.97-6.919L480 203.3V464c0 26.51-21.49 48-48 48H208C181.5 512 160 490.5 160 464V203.3L101.1 249.1C96.05 253.7 88.99 255.1 81.98 255.1c-9.388 0-18.69-4.057-25.01-11.85L7.012 182.5C2.292 176.7-.0003 169.7-.0003 162.8c0-9.262 4.111-18.44 12.01-24.68l135-106.6C159.8 21.49 175.7 16 191.1 16H225.6C233.3 61.36 272.5 96 320 96s86.73-34.64 94.39-80h33.6c16.35 0 32.22 5.49 44.99 15.57l135 106.6C635.9 144.4 640 153.6 640 162.8z"/>
                                            </svg>
                                            <span class="customer-show-tab-text" >所有装備</span>
                                        </div>
                                        <div class="customer-show-tab text-blue-500" >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="customer-show-tab-logo" >
                                                <path d="M159.1 198.3L261.4 46.25C271.2 31.54 291 27.57 305.8 37.37C320.5 47.18 324.4 67.04 314.6 81.75L219.8 223.1H272C289.7 223.1 304 238.3 304 255.1C304 273.7 289.7 287.1 272 287.1H192V319.1H272C289.7 319.1 304 334.3 304 352C304 369.7 289.7 384 272 384H192V448C192 465.7 177.7 480 159.1 480C142.3 480 127.1 465.7 127.1 448V384H47.1C30.33 384 15.1 369.7 15.1 352C15.1 334.3 30.33 319.1 47.1 319.1H127.1V287.1H47.1C30.33 287.1 15.1 273.7 15.1 255.1C15.1 238.3 30.33 223.1 47.1 223.1H100.2L5.374 81.75C-4.429 67.04-.456 47.18 14.25 37.37C28.95 27.57 48.82 31.54 58.62 46.25L159.1 198.3z"/>
                                            </svg>
                                            <span class="customer-show-tab-text" >購入履歴</span>
                                        </div>
                                        <div class="customer-show-tab text-blue-500" >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="customer-show-tab-logo" >
                                                <path d="M528 32h-480C21.49 32 0 53.49 0 80V96h576V80C576 53.49 554.5 32 528 32zM0 432C0 458.5 21.49 480 48 480h480c26.51 0 48-21.49 48-48V128H0V432zM368 192h128C504.8 192 512 199.2 512 208S504.8 224 496 224h-128C359.2 224 352 216.8 352 208S359.2 192 368 192zM368 256h128C504.8 256 512 263.2 512 272S504.8 288 496 288h-128C359.2 288 352 280.8 352 272S359.2 256 368 256zM368 320h128c8.836 0 16 7.164 16 16S504.8 352 496 352h-128c-8.836 0-16-7.164-16-16S359.2 320 368 320zM176 192c35.35 0 64 28.66 64 64s-28.65 64-64 64s-64-28.66-64-64S140.7 192 176 192zM112 352h128c26.51 0 48 21.49 48 48c0 8.836-7.164 16-16 16h-192C71.16 416 64 408.8 64 400C64 373.5 85.49 352 112 352z"/>
                                            </svg>
                                            <span class="customer-show-tab-text" >ライセンス</span>
                                        </div>
                                    </div>
                                    <div class="w-full" >
                                        {{-- <div class="customer-show-detail" style="display: none;"> --}}
                                        <div class="customer-show-detail" >
                                            <x-customer.log :logs="$logs" />
                                        </div>
                                        <div class="customer-show-detail" style="display: none;">
                                            <x-customer.xxxxxxxxxx/>
                                        </div>
                                        <div class="customer-show-detail" style="display: none;">
                                            <x-customer.xxxxxxxxxx/>
                                        </div>
                                        <div class="customer-show-detail" style="display: none;">
                                            <x-customer.licens :licenses="$customerLicenses" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                </div>
            </div>
        </div>
    </div>
</x-customer-layout>
