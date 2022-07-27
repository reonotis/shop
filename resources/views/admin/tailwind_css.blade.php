<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}?<?= date('YmdHis'); ?>">

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            {{-- width --}}
            <div class="w-0" ></div>	    {{-- width: 0; --}}
            <div class="w-1" ></div>	    {{-- width: 0.25rem; --}}
            <div class="w-2" ></div>	    {{-- width: 0.5rem; --}}
            <div class="w-3" ></div>	    {{-- width: 0.75rem; --}}
            <div class="w-4" ></div>	    {{-- width: 1rem; --}}
            <div class="w-5" ></div>	    {{-- width: 1.25rem; --}}
            <div class="w-6" ></div>	    {{-- width: 1.5rem; --}}
            <div class="w-8" ></div>	    {{-- width: 2rem; --}}
            <div class="w-10" ></div>	    {{-- width: 2.5rem; --}}
            <div class="w-12" ></div>	    {{-- width: 3rem; --}}
            <div class="w-16" ></div>	    {{-- width: 4rem; --}}
            <div class="w-20" ></div>	    {{-- width: 5rem; --}}
            <div class="w-24" ></div>	    {{-- width: 6rem; --}}
            <div class="w-32" ></div>	    {{-- width: 8rem; --}}
            <div class="w-40" ></div>	    {{-- width: 10rem; --}}
            <div class="w-48" ></div>	    {{-- width: 12rem; --}}
            <div class="w-56" ></div>	    {{-- width: 14rem; --}}
            <div class="w-64" ></div>	    {{-- width: 16rem; --}}
            <div class="w-auto" ></div>	    {{-- width: auto; --}}
            <div class="w-px" ></div>	    {{-- width: 1px; --}}
            <div class="w-1/2" ></div>	    {{-- width: 50%; --}}
            <div class="w-1/3" ></div>	    {{-- width: 33.333333%; --}}
            <div class="w-2/3" ></div>	    {{-- width: 66.666667%; --}}
            <div class="w-1/4" ></div>	    {{-- width: 25%; --}}
            <div class="w-2/4" ></div>	    {{-- width: 50%; --}}
            <div class="w-3/4" ></div>	    {{-- width: 75%; --}}
            <div class="w-1/5" ></div>	    {{-- width: 20%; --}}
            <div class="w-2/5" ></div>	    {{-- width: 40%; --}}
            <div class="w-3/5" ></div>	    {{-- width: 60%; --}}
            <div class="w-4/5" ></div>	    {{-- width: 80%; --}}
            <div class="w-1/6" ></div>	    {{-- width: 16.666667%; --}}
            <div class="w-2/6" ></div>	    {{-- width: 33.333333%; --}}
            <div class="w-3/6" ></div>	    {{-- width: 50%; --}}
            <div class="w-4/6" ></div>	    {{-- width: 66.666667%; --}}
            <div class="w-5/6" ></div>	    {{-- width: 83.333333%; --}}
            <div class="w-1/12" ></div>	    {{-- width: 8.333333%; --}}
            <div class="w-2/12" ></div>	    {{-- width: 16.666667%; --}}
            <div class="w-3/12" ></div>	    {{-- width: 25%; --}}
            <div class="w-4/12" ></div>	    {{-- width: 33.333333%; --}}
            <div class="w-5/12" ></div>	    {{-- width: 41.666667%; --}}
            <div class="w-6/12" ></div>	    {{-- width: 50%; --}}
            <div class="w-7/12" ></div>	    {{-- width: 58.333333%; --}}
            <div class="w-8/12" ></div>	    {{-- width: 66.666667%; --}}
            <div class="w-9/12" ></div>	    {{-- width: 75%; --}}
            <div class="w-10/12" ></div>	{{-- width: 83.333333%; --}}
            <div class="w-11/12" ></div>	{{-- width: 91.666667%; --}}
            <div class="w-full" ></div>	    {{-- width: 100%; --}}
            <div class="w-screen" ></div>	{{-- width: 100vw; --}}




            {{-- padding --}}
            <div class="p-0"></div>	    {{-- padding: 0; --}}
            <div class="p-1"></div>	    {{-- padding: 0.25rem; --}}
            <div class="p-2"></div>	    {{-- padding: 0.5rem; --}}
            <div class="p-3"></div>	    {{-- padding: 0.75rem; --}}
            <div class="p-4"></div>	    {{-- padding: 1rem; --}}
            <div class="p-5"></div>	    {{-- padding: 1.25rem; --}}
            <div class="p-6"></div>	    {{-- padding: 1.5rem; --}}
            <div class="p-8"></div>	    {{-- padding: 2rem; --}}
            <div class="p-10"></div>	{{-- padding: 2.5rem; --}}
            <div class="p-12"></div>	{{-- padding: 3rem; --}}
            <div class="p-16"></div>	{{-- padding: 4rem; --}}
            <div class="p-20"></div>	{{-- padding: 5rem; --}}
            <div class="p-24"></div>	{{-- padding: 6rem; --}}
            <div class="p-32"></div>	{{-- padding: 8rem; --}}
            <div class="p-40"></div>	{{-- padding: 10rem; --}}
            <div class="p-48"></div>	{{-- padding: 12rem; --}}
            <div class="p-56"></div>	{{-- padding: 14rem; --}}
            <div class="p-64"></div>	{{-- padding: 16rem; --}}
            <div class="p-px"></div>	{{-- padding: 1px; --}}
            <div class="py-0"></div>	{{-- padding-top: 0; padding-bottom: 0; --}}
            <div class="px-0"></div>	{{-- padding-left: 0; padding-right: 0; --}}
            <div class="py-1"></div>	{{-- padding-top: 0.25rem; padding-bottom: 0.25rem; --}}
            <div class="px-1"></div>	{{-- padding-left: 0.25rem; padding-right: 0.25rem; --}}
            <div class="py-2"></div>	{{-- padding-top: 0.5rem; padding-bottom: 0.5rem; --}}
            <div class="px-2"></div>	{{-- padding-left: 0.5rem; padding-right: 0.5rem; --}}
            <div class="py-3"></div>	{{-- padding-top: 0.75rem; padding-bottom: 0.75rem; --}}
            <div class="px-3"></div>	{{-- padding-left: 0.75rem; padding-right: 0.75rem; --}}
            <div class="py-4"></div>	{{-- padding-top: 1rem; padding-bottom: 1rem; --}}
            <div class="px-4"></div>	{{-- padding-left: 1rem; padding-right: 1rem; --}}
            <div class="py-5"></div>	{{-- padding-top: 1.25rem; padding-bottom: 1.25rem; --}}
            <div class="px-5"></div>	{{-- padding-left: 1.25rem; padding-right: 1.25rem; --}}
            <div class="py-6"></div>	{{-- padding-top: 1.5rem; padding-bottom: 1.5rem; --}}
            <div class="px-6"></div>	{{-- padding-left: 1.5rem; padding-right: 1.5rem; --}}
            <div class="py-8"></div>	{{-- padding-top: 2rem; padding-bottom: 2rem; --}}
            <div class="px-8"></div>	{{-- padding-left: 2rem; padding-right: 2rem; --}}
            <div class="py-10"></div>	{{-- padding-top: 2.5rem; padding-bottom: 2.5rem; --}}
            <div class="px-10"></div>	{{-- padding-left: 2.5rem; padding-right: 2.5rem; --}}
            <div class="py-12"></div>	{{-- padding-top: 3rem; padding-bottom: 3rem; --}}
            <div class="px-12"></div>	{{-- padding-left: 3rem; padding-right: 3rem; --}}
            <div class="py-16"></div>	{{-- padding-top: 4rem; padding-bottom: 4rem; --}}
            <div class="px-16"></div>	{{-- padding-left: 4rem; padding-right: 4rem; --}}
            <div class="py-20"></div>	{{-- padding-top: 5rem; padding-bottom: 5rem; --}}
            <div class="px-20"></div>	{{-- padding-left: 5rem; padding-right: 5rem; --}}
            <div class="py-24"></div>	{{-- padding-top: 6rem; padding-bottom: 6rem; --}}
            <div class="px-24"></div>	{{-- padding-left: 6rem; padding-right: 6rem; --}}
            <div class="py-32"></div>	{{-- padding-top: 8rem; padding-bottom: 8rem; --}}
            <div class="px-32"></div>	{{-- padding-left: 8rem; padding-right: 8rem; --}}
            <div class="py-40"></div>	{{-- padding-top: 10rem; padding-bottom: 10rem; --}}
            <div class="px-40"></div>	{{-- padding-left: 10rem; padding-right: 10rem; --}}
            <div class="py-48"></div>	{{-- padding-top: 12rem; padding-bottom: 12rem; --}}
            <div class="px-48"></div>	{{-- padding-left: 12rem; padding-right: 12rem; --}}
            <div class="py-56"></div>	{{-- padding-top: 14rem; padding-bottom: 14rem; --}}
            <div class="px-56"></div>	{{-- padding-left: 14rem; padding-right: 14rem; --}}
            <div class="py-64"></div>	{{-- padding-top: 16rem; padding-bottom: 16rem; --}}
            <div class="px-64"></div>	{{-- padding-left: 16rem; padding-right: 16rem; --}}
            <div class="py-px"></div>	{{-- padding-top: 1px; padding-bottom: 1px; --}}
            <div class="px-px"></div>	{{-- padding-left: 1px; padding-right: 1px; --}}
            <div class="pt-0"></div>	{{-- padding-top: 0; --}}
            <div class="pr-0"></div>	{{-- padding-right: 0; --}}
            <div class="pb-0"></div>	{{-- padding-bottom: 0; --}}
            <div class="pl-0"></div>	{{-- padding-left: 0; --}}
            <div class="pt-1"></div>	{{-- padding-top: 0.25rem; --}}
            <div class="pr-1"></div>	{{-- padding-right: 0.25rem; --}}
            <div class="pb-1"></div>	{{-- padding-bottom: 0.25rem; --}}
            <div class="pl-1"></div>	{{-- padding-left: 0.25rem; --}}
            <div class="pt-2"></div>	{{-- padding-top: 0.5rem; --}}
            <div class="pr-2"></div>	{{-- padding-right: 0.5rem; --}}
            <div class="pb-2"></div>	{{-- padding-bottom: 0.5rem; --}}
            <div class="pl-2"></div>	{{-- padding-left: 0.5rem; --}}
            <div class="pt-3"></div>	{{-- padding-top: 0.75rem; --}}
            <div class="pr-3"></div>	{{-- padding-right: 0.75rem; --}}
            <div class="pb-3"></div>	{{-- padding-bottom: 0.75rem; --}}
            <div class="pl-3"></div>	{{-- padding-left: 0.75rem; --}}
            <div class="pt-4"></div>	{{-- padding-top: 1rem; --}}
            <div class="pr-4"></div>	{{-- padding-right: 1rem; --}}
            <div class="pb-4"></div>	{{-- padding-bottom: 1rem; --}}
            <div class="pl-4"></div>	{{-- padding-left: 1rem; --}}
            <div class="pt-5"></div>	{{-- padding-top: 1.25rem; --}}
            <div class="pr-5"></div>	{{-- padding-right: 1.25rem; --}}
            <div class="pb-5"></div>	{{-- padding-bottom: 1.25rem; --}}
            <div class="pl-5"></div>	{{-- padding-left: 1.25rem; --}}
            <div class="pt-6"></div>	{{-- padding-top: 1.5rem; --}}
            <div class="pr-6"></div>	{{-- padding-right: 1.5rem; --}}
            <div class="pb-6"></div>	{{-- padding-bottom: 1.5rem; --}}
            <div class="pl-6"></div>	{{-- padding-left: 1.5rem; --}}
            <div class="pt-8"></div>	{{-- padding-top: 2rem; --}}
            <div class="pr-8"></div>	{{-- padding-right: 2rem; --}}
            <div class="pb-8"></div>	{{-- padding-bottom: 2rem; --}}
            <div class="pl-8"></div>	{{-- padding-left: 2rem; --}}
            <div class="pt-10"></div>	{{-- padding-top: 2.5rem; --}}
            <div class="pr-10"></div>	{{-- padding-right: 2.5rem; --}}
            <div class="pb-10"></div>	{{-- padding-bottom: 2.5rem; --}}
            <div class="pl-10"></div>	{{-- padding-left: 2.5rem; --}}
            <div class="pt-12"></div>	{{-- padding-top: 3rem; --}}
            <div class="pr-12"></div>	{{-- padding-right: 3rem; --}}
            <div class="pb-12"></div>	{{-- padding-bottom: 3rem; --}}
            <div class="pl-12"></div>	{{-- padding-left: 3rem; --}}
            <div class="pt-16"></div>	{{-- padding-top: 4rem; --}}
            <div class="pr-16"></div>	{{-- padding-right: 4rem; --}}
            <div class="pb-16"></div>	{{-- padding-bottom: 4rem; --}}
            <div class="pl-16"></div>	{{-- padding-left: 4rem; --}}
            <div class="pt-20"></div>	{{-- padding-top: 5rem; --}}
            <div class="pr-20"></div>	{{-- padding-right: 5rem; --}}
            <div class="pb-20"></div>	{{-- padding-bottom: 5rem; --}}
            <div class="pl-20"></div>	{{-- padding-left: 5rem; --}}
            <div class="pt-24"></div>	{{-- padding-top: 6rem; --}}
            <div class="pr-24"></div>	{{-- padding-right: 6rem; --}}
            <div class="pb-24"></div>	{{-- padding-bottom: 6rem; --}}
            <div class="pl-24"></div>	{{-- padding-left: 6rem; --}}
            <div class="pt-32"></div>	{{-- padding-top: 8rem; --}}
            <div class="pr-32"></div>	{{-- padding-right: 8rem; --}}
            <div class="pb-32"></div>	{{-- padding-bottom: 8rem; --}}
            <div class="pl-32"></div>	{{-- padding-left: 8rem; --}}
            <div class="pt-40"></div>	{{-- padding-top: 10rem; --}}
            <div class="pr-40"></div>	{{-- padding-right: 10rem; --}}
            <div class="pb-40"></div>	{{-- padding-bottom: 10rem; --}}
            <div class="pl-40"></div>	{{-- padding-left: 10rem; --}}
            <div class="pt-48"></div>	{{-- padding-top: 12rem; --}}
            <div class="pr-48"></div>	{{-- padding-right: 12rem; --}}
            <div class="pb-48"></div>	{{-- padding-bottom: 12rem; --}}
            <div class="pl-48"></div>	{{-- padding-left: 12rem; --}}
            <div class="pt-56"></div>	{{-- padding-top: 14rem; --}}
            <div class="pr-56"></div>	{{-- padding-right: 14rem; --}}
            <div class="pb-56"></div>	{{-- padding-bottom: 14rem; --}}
            <div class="pl-56"></div>	{{-- padding-left: 14rem; --}}
            <div class="pt-64"></div>	{{-- padding-top: 16rem; --}}
            <div class="pr-64"></div>	{{-- padding-right: 16rem; --}}
            <div class="pb-64"></div>	{{-- padding-bottom: 16rem; --}}
            <div class="pl-64"></div>	{{-- padding-left: 16rem; --}}
            <div class="pt-px"></div>	{{-- padding-top: 1px; --}}
            <div class="pr-px"></div>	{{-- padding-right: 1px; --}}
            <div class="pb-px"></div>	{{-- padding-bottom: 1px; --}}
            <div class="pl-px"></div>	{{-- padding-left: 1px; --}}

        </div>
    </body>
</html>