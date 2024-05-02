<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'url', 'chapter_id', 'description', 'duration'
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($video) {
            if ($video->url) {
                Storage::disk('public')->delete($video->url);
            }
        });
    }

    public function videoUrl(): string
    {
        return Storage::url($this->url);
    }
}
