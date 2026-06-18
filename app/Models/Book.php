<?php

namespace App\Models;

use App\Models\Category;
use App\Models\BookView;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'publisher',
        'year',
        'description',
        'cover_image',
        'pdf_file',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function views()
    {
        return $this->hasMany(BookView::class);
    }

}
