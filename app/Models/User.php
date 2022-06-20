<?php

namespace App\Models;

use App\Models\Interfaces\IFileable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements IFileable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    public function avatar()
    {
//        return $this->morphOne(File::class, 'avatar');
        return $this->morphOne(File::class, 'fileable')->where('avatar', 1);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function owner() {
        return $this;
    }
}
