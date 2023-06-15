<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Validator;
use App\Models\Anggota;

class User extends Authenticatable
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
        'password' => 'hashed',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (self::count() === 0) {
                $user->role = 'admin';
            } else {
                $validator = Validator::make(
                    ['email' => $user->email],
                    ['email' => 'exists:anggotas,email']
                );

                if ($validator->fails()) {
                    throw new \Exception('Email not found in anggotas table');
                }

                $user->role = 'member';
            }
        });
    }

    /**
     * Get the anggota associated with the user.
     */
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'email', 'email');
    }
}
