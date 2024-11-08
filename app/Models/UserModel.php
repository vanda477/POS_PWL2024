<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
    // protected $table = 'm_user';
    // protected $primaryKey = 'user_id'; 
    // protected $fillable = ['username', 'nama', 'password', 'level_id', 'create_at', 'updated_at'];

class UserModel extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }    
    public function getJWTCustomClaims()
    {
        return[];
    }
    
    use HasFactory;

        protected $table = 'm_user';
        protected $primaryKey = 'user_id';
        protected $fillable =['username', 'password', 'nama', 'level_id', 'create_at', 'update_at', 'image'];
        protected $hidden = ['password']; //jangan di tampilkan saat select
        protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash


    // Relationship to the Level model
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }
    public function getRole()
    {
        return $this->level->level_kode;
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}

