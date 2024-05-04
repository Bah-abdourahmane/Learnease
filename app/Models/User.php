<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'name', 'email', 'password', 'role', 'phone',
    ];

    public function favoriteCourses()
    {
        return $this->belongsToMany(Course::class, 'favorite_courses', 'user_id', 'course_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function messagesSent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function messagesReceived()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }



    public function skillLevels()
    {
        return $this->belongsToMany(SkillLevel::class, 'user_skill_level', 'user_id', 'skill_level_id');
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
        'password' => 'hashed',
    ];
    /**
     * Interact with user's first name.
     * 
     * @param string $value
     * @return Illuminate\Database\Eloquent\Casts\Attribute;
     */

    // protected function type(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) => ["user", "admin", "teacher"][$value],
    //     );
    // }
}
