<?php

namespace App\Models;

use App\Models\Profil;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'image',
        'profil_id',
        'category_id',
    ];

    public function getImageAttribute($value){
        return $value??'article/articleNoImage.png';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function profil()
    {
        return $this->belongsTo(Profil::class);
    }
}
