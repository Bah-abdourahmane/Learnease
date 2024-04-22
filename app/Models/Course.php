<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'cover_photo', 'domains_id', 'instructor_id', 'is_approved', 'level', 'publish_date'
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domains_id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function favoriteBy()
    {
        return $this->belongsToMany(User::class, 'favorite_courses', 'course_id', 'user_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function viewStats()
    {
        return $this->hasMany(ViewStat::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Événement lors de la suppression d'un cours
        static::deleting(function ($course) {
            // Vérifier s'il y a une image associée et la supprimer du stockage
            if ($course->cover_photo) {
                Storage::disk('public')->delete($course->cover_photo);
            }
        });
    }

    public function imageUrl(): string
    {
        return Storage::url($this->cover_photo);
    }
}
