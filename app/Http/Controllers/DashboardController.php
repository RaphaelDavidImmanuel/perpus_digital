<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookView;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Dashboard Admin
        if (auth()->user()->role == 'admin') {

            $totalBooks = Book::count();
            $totalCategories = Category::count();
            $totalUsers = User::where('role', 'user')->count();
            $totalViews = BookView::count();

            $latestBooks = Book::latest()->take(5)->get();
            $popularBooks = Book::select('books.id','books.title',DB::raw('COUNT(book_views.id) as total_views')
            )->leftJoin('book_views', 'books.id', '=', 'book_views.book_id')->groupBy('books.id', 'books.title')->orderByDesc('total_views')->take(5)->get();

            return view('admin.dashboard', compact('totalBooks','totalCategories','totalUsers','totalViews', 'latestBooks', 'popularBooks'));
        }

        // Dashboard User
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $totalReadBooks = BookView::where('user_id', auth()->id())->count();
        $latestBooks = Book::latest()->take(5)->get();

        return view('user.dashboard', compact('totalBooks','totalCategories','totalReadBooks','latestBooks'));
    }
}
