<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-bold">
            Katalog Buku
        </h2>
    </x-slot>

    <div class="p-6">
        <form method="GET" class="mb-6">
            <div class="flex gap-4">
                <input type="text" name="search" placeholder="Cari buku..." value="{{ request('search') }}"
                    class="border rounded px-3 py-2 w-full">

                <select name="category" class="border rounded px-3 py-2">
                    <option value="">
                        Semua Kategori
                    </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button class="bg-blue-500 text-white px-4 rounded">
                    Cari
                </button>
            </div>
        </form>

        <div class="grid md:grid-cols-4 gap-6">
            @foreach ($books as $book)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-3 flex flex-col">

                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}"
                            style="height:220px; width:100%; object-fit:cover;" class="rounded">
                        {{-- <img src="{{ asset('storage/' . $book->cover_image) }}"class="h-48 w-full object-cover rounded"> --}}
                    @endif

                    <div class="mt-3">
                        <h3 class="font-bold text-lg line-clamp-2">
                            {{ $book->title }}
                        </h3>

                        <p class="text-sm text-gray-600">
                            {{ $book->author }}
                        </p>
                        <br>
                        <span class="inline-block mt-1 text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">
                            {{ $book->category->name }}
                        </span>
                        <br>

                        <a href="{{ route('catalog.show', $book) }}"class="mt-auto block text-center bg-green-500 hover:bg-green-600 text-white py-2 rounded">
                            Detail Buku
                        </a>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $books->links() }}
        </div>
    </div>
</x-app-layout>
