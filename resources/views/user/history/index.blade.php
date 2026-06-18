<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Riwayat Bacaan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Judul Buku</th>
                            <th class="border p-2">Tanggal Dibaca</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($histories as $history)
                            <tr>
                                <td class="border p-2">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border p-2">
                                    {{ $history->book->title }}
                                </td>

                                <td class="border p-2">
                                    {{ $history->viewed_at }}
                                </td>

                                <td class="border p-2">
                                    <a href="{{ route('catalog.show', $history->book) }}"
                                        class="bg-blue-500 text-white px-3 py-1 rounded">
                                        Detail
                                    </a>
                                </td>

                            </tr>
                        @empty

                            <tr>
                                <td colspan="4" class="border p-2 text-center">
                                    Belum ada riwayat bacaan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
