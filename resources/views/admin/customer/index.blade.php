<x-customer-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Customer Management') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <a href="{{ route('admin.customers.create') }}" class="p-4 md:w-1/4 sm:w-1/2 w-full" >
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg h-full">
                            <svg viewBox="0 0 640 512" class="text-indigo-500 w-12 h-12 mb-3 inline-block" >
                                <path d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"/>
                            </svg>
                            <h2 class="font-medium text-2xl text-gray-900">顧客登録</h2>
                            <p class="leading-relaxed">新しく顧客の登録を行います</p>
                        </div>
                </a>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('admin.customerSearch.index') }}" >
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg h-full">
                            <svg viewBox="0 0 640 512" class="text-indigo-500 w-12 h-12 mb-3 inline-block" >
                                <path d="M512 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h448c35.35 0 64-28.65 64-64V96C576 60.65 547.3 32 512 32zM176 128c35.35 0 64 28.65 64 64s-28.65 64-64 64s-64-28.65-64-64S140.7 128 176 128zM272 384h-192C71.16 384 64 376.8 64 368C64 323.8 99.82 288 144 288h64c44.18 0 80 35.82 80 80C288 376.8 280.8 384 272 384zM496 320h-128C359.2 320 352 312.8 352 304S359.2 288 368 288h128C504.8 288 512 295.2 512 304S504.8 320 496 320zM496 256h-128C359.2 256 352 248.8 352 240S359.2 224 368 224h128C504.8 224 512 231.2 512 240S504.8 256 496 256zM496 192h-128C359.2 192 352 184.8 352 176S359.2 160 368 160h128C504.8 160 512 167.2 512 176S504.8 192 496 192z"/>
                            </svg>
                            <h2 class="font-medium text-2xl text-gray-900">検索</h2>
                            <p class="leading-relaxed">名前や電話番号から顧客の検索を行います</p>
                        </div>
                    </a>
                </div>

                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg h-full">
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg h-full">
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg h-full">
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg h-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-customer-layout>
