
@props(['logs' => NULL ])

<section class="text-gray-600 py-2 flex flex-wrap w-full">

    {{-- <div class="w-full flex flex-wrap mb-4">
        <a href="" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</a>
    </div> --}}

    @foreach ($logs as $log)
        <div class="customer-show-detail-logs">
            <div class="log-num-line-area"><div class="log-num-line"></div></div>
            <a href="" class="customer-show-detail-log-anchor" >
                <div class="customer-show-detail-log-num">{{ $log->num }}</div>
                <div class="flex-grow pl-4 flex flex-col">
                    <h2 class="font-medium mb-1 text-xl">{{ $log->date }}</h2>
                    <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                        <p class="leading-relaxed">
                            コメントが入りますコメントが入りますコメントが入りますコメントが入りますコメントが入りますコメントが入りますコメントが入りますコメントが入りますコメントが入りますコメントが入りますコメントが入りますコメントが入ります
                        </p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</section>