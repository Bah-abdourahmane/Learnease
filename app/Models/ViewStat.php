<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'views_count'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
