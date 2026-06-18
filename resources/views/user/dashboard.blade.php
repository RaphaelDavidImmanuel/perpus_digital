<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h3 class="text-2xl font-bold">
                    Selamat Datang, {{ auth()->user()->name }}
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                <div class="bg-white p-6 rounded shadow">
                    <h4 class="text-gray-500">
                        Total Buku
                    </h4>

                    <p class="text-3xl font-bold">
                        {{ $totalBooks }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded shadow">
                    <h4 class="text-gray-500">
                        Total Kategori
                    </h4>

                    <p class="text-3xl font-bold">
                        {{ $totalCategories }}
                    </p>
                </div>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="font-bold text-lg">
                        Buku Terbaru
                    </h4>

                    <div class="flex gap-2">
                        <a href="{{ route('history') }}"
                            class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">
                            Riwayat Bacaan
                        </a>

                        <a href="{{ route('catalog.index') }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Lihat Katalog
                        </a>
                    </div>
            </div>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border p-2">Judul</th>
                            <th class="border p-2">Penulis</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($latestBooks as $book)
                            <tr>
                                <td class="border p-2">
                                    {{ $book->title }}
                                </td>

                                <td class="border p-2">
                                    {{ $book->author }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
