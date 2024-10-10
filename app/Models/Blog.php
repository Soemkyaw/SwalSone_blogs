<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['status'];


    public function scopeFilter($query,$filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filter['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $category = str_replace('-', ' ', $category);
                $query->where('name', 'like', '%' . $category . '%');
            });
        });

        $query->when($filter['author'] ?? false, function ($query, $author) {
            // dd($author);
            $query->whereHas('user', function ($query) use ($author) {
                $author = str_replace('_', ' ', $author);
                // dd($author);
                $query->where('author_name', $author);
            });
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class);
    }
}
