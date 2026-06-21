<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Inventaris Gudang
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-2xl font-bold mb-4">
                    Selamat Datang
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <div class="bg-blue-500 text-white p-4 rounded">
                        <h4>Total Barang</h4>
                        <p class="text-3xl">{{ $totalItems }}</p>
                    </div>

                    <div class="bg-green-500 text-white p-4 rounded">
                        <h4>Barang Masuk</h4>
                        <p class="text-3xl">0</p>
                    </div>

                    <div class="bg-red-500 text-white p-4 rounded">
                        <h4>Barang Keluar</h4>
                        <p class="text-3xl">0</p>
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>