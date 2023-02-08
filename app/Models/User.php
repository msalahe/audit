<?php

namespace App\Models;

use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected  $fillable = [
        'full_name',
        'email'
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->{$post->getKeyName()} = (string) Str::uuid();
        });
    }


    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {

            return [
                'role' => $this->role
            ];
    }

    public function findForPassport($identifier)
    {
        return $this->where('email', $identifier)->first();
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class)->withPivot('level')->withTimestamps();
    }

    public function socialLinks(): HasMany
    {
        return $this->hasMany(socialLink::class)->withPivot('level')->withTimestamps();
    }
}
