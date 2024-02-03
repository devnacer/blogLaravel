<?php

namespace App\Models;

use App\Models\Article;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function trashed()
    {
        return is_null($this->deleted_at);
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'profil_id');
    }
}
