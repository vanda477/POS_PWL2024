<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    protected $table = 'm_user';
    protected $primaryKey = 'user_id'; 
    protected $fillable = ['username', 'nama', 'password', 'level_id'];

    // Relationship to the Level model
    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
