<x-app-layout>
    
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">
            {{ $book->title }}
        </h2>

        <iframe src="{{ asset('storage/' . $book->pdf_file) }}" width="100%" height="800px">
        </iframe>

    </div>
</x-app-layout>
