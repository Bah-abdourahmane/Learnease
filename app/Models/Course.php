<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'cover_photo', 'domain_id', 'instructor_id', 'is_approved', 'publish_date'
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
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
}
