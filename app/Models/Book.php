<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'author',
        'description',
        'quantity',
        'image',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Str::limit($value, 70),
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Accessor for the 'image' attribute.
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Str::startsWith($value, 'https')
                ? $value
                : asset('storage/books/' . $value),
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'borrowings')
            ->withPivot('status');
    }
}