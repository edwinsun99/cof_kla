<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    
    // 🧩 Kolom yang bisa diisi
    protected $fillable = [
        'un',
        'email',
        'pw',
        'role',
        'branch_id'
    ];

    // 🧩 Agar password otomatis di-hash saat diset
    public function setPwAttribute($value)
    {
        $this->attributes['pw'] = bcrypt($value);
    }

    // 🧩 Override default Laravel auth fields (opsional)
    public function getAuthPassword()
    {
        return $this->pw;
    }
    public function branch()
{
    return $this->belongsTo(Branch::class);
}

=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
>>>>>>> 1ceaeb5f97112d2834eed21cc13180f9d2e49f31
}
