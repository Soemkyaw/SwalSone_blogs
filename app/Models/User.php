<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'author_name',
        'email',
        'password',
        "is_admin",
        'slug',
        'phone_no',
        'gender',
        'address'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function subscribeBlogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function isSubscribed($blog)
    {
        return auth()->user()->subscribeBlogs && auth()->user()->subscribeBlogs->contains('id', $blog->id);
    }

    public function getAuthor_nameAttAttribute()
    {
        return ucfirst($this->attributes['author_name']);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
