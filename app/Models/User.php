<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;



class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'profile_picture',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function school(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(School::class);
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\HasOne
    {

        return $this->hasOne(Student::class);
    }

    public function classroom(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }


    public function badgeProgress(): HasMany
    {
        return $this->hasMany(BadgeProgress::class);
    }

    protected function unlockedBadges(): Attribute
    {
        return Attribute::make(
            get: fn () =>
            \App\Models\Badge::whereIn(
                'id',
                $this->badgeProgress()
                    ->whereNotNull('unlocked_at')
                    ->pluck('badge_id')
            )->get()
        );
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
