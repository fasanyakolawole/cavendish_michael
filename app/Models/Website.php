<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'user_id',
    ];

    /**
     * Get the user that owns the website.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The categories that belong to the website.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'websites_categories', 'website_id', 'category_id');
    }

    /**
     * The rankings for the website.
     */
    public function rankings()
    {
        return $this->hasMany(Ranking::class);
    }
}
