<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

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


}
