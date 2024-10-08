<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Note extends Model
{
    use HasFactory;
    protected $hidden = [ 'created_at', 'updated_at'];

    public function testo()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    protected $fillable = [
        "title",
        "text",
        "id_user",
    ];

}
