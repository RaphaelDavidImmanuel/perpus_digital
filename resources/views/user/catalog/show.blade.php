<x-app-layout>

    <div class="max-w-6xl mx-auto py-8">
        <div class="bg-white rounded shadow p-6">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-full h-96 object-cover rounded shadow">
                    @endif
                </div>

                <div class="md:col-span-2">
                    <h1 class="text-3xl font-bold mb-4">
                        {{ $book->title }}
                    </h1>
                    <p><b>Penulis:</b> {{ $book->author }}</p>
                    <p><b>Penerbit:</b> {{ $book->publisher }}</p>
                    <p><b>Tahun:</b> {{ $book->year }}</p>
                    <p><b>Kategori:</b>
                        {{ $book->category->name }}
                    </p>

                    <div class="mt-4">
                        {{ $book->description }}
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('catalog.read', $book) }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Baca Buku
                        </a>

                        <a href="{{ route('catalog.download', $book) }}"
                            class="bg-green-500 text-white px-4 py-2 rounded">
                            Download PDF
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
