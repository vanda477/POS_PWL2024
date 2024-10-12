<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;


    // protected $table = 'm_user';
    // protected $primaryKey = 'user_id'; 
    // protected $fillable = ['username', 'nama', 'password', 'level_id', 'create_at', 'updated_at'];

class UserModel extends Authenticatable
{
        use HasFactory;

        protected $table = 'm_user';
        protected $primaryKey = 'user_id';
        protected $fillable =['username', 'password', 'nama', 'level_id', 'create_at', 'update_at'];
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
}

