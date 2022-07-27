<x-customer-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Customer List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="">
                        顧客検索結果
                    </h3>

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">電話番号</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ライセンス</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">本数</th>
                                            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">表示</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td class="px-4 py-3">{{ $customer->f_name . ' ' . $customer->l_name }} 様</td>
                                                <td class="px-4 py-3">{{ $customer->tel }}</td>
                                                <td class="px-4 py-3">{{ $customer->email }}</td>
                                                <td class="px-4 py-3"></td>
                                                <td class="px-4 py-3">本</td>
                                                <td class="w-10 text-center"><a href="{{ route('admin.customers.show', ['customer'=> $customer->id] ) }}" >表示</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-customer-layout>
