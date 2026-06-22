<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\BookView;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $books = Book::with('category');

        // Ini untuk Search (judul dan penulis)
        if ($request->search) {
            $books->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')->orWhere('author', 'like', '%' . $request->search . '%');
            });
        }

        // Ini bagian buat Filter kategori nya ya wok
        if ($request->category) {
            $books->where('category_id', $request->category);
        }

        $books = $books->latest()->paginate(8)->appends($request->query());

        return view('user.catalog.index', compact('books','categories'));
    }

    public function show(Book $book)
    {
        BookView::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'viewed_at' => now(),
        ]);

        return view('user.catalog.show', compact('book'));
    }

    public function read(Book $book)
    {
        return view('user.catalog.read', compact('book'));
    }

    public function download(Book $book)
    {
        return Storage::disk('public')->download($book->pdf_file);
    }

    public function history()
    {
        $histories = BookView::where('user_id', auth()->id())->latest()->get();;

        return view('user.history.index', compact('histories'));
    }

    // public function history()
    // {
    //     $histories = BookView::with('book')->where('user_id', auth()->id())->select('book_id')->selectRaw('MAX(viewed_at) as viewed_at')->groupBy('book_id')->latest('viewed_at')->get();

    //     return view('user.history.index', compact('histories'));
    // }

}
