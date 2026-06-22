<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'books' => Book::latest()->take(6)->get(),
            'categories' => Category::all(),
            'totalBooks' => Book::count(),
            'totalCategories' => Category::count(),
            'totalUsers' => User::count(),
        ]);
    }
}
