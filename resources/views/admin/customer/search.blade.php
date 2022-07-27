<x-customer-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Customer Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="">
                        顧客検索
                    </h3>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{ route('admin.customerSearch.searching') }}" method="POST" >
                        @csrf
                        <section class="text-gray-600 body-font relative">
                            <div class="container px-5 py-12 mx-auto">
                                <div class="md:w-3/4 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-1/2">
                                            <div class="relative">
                                                <label for="f_name" class="leading-7 text-sm text-gray-600">{{ __('First Name') }}</label>
                                                <input type="text" id="f_name" name="f_name" value="{{ old('f_name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2">
                                            <div class="relative">
                                                <label for="l_name" class="leading-7 text-sm text-gray-600">{{ __('Last Name') }}</label>
                                                <input type="text" id="l_name" name="l_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2">
                                            <div class="relative">
                                                <label for="f_read" class="leading-7 text-sm text-gray-600">{{ __('Last Name Read') }}</label>
                                                <input type="text" id="f_read" name="f_read" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2">
                                            <div class="relative">
                                                <label for="l_read" class="leading-7 text-sm text-gray-600">{{ __('Last Name Read') }}</label>
                                                <input type="text" id="l_read" name="l_read" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="email" class="leading-7 text-sm text-gray-600">{{ __('Email') }}</label>
                                                <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mt-4 flex justify-around">
                                            <button onclick="location.href='{{ route('admin.customers.index') }}'" type="button" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索する</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-customer-layout>
