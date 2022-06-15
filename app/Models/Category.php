<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Note;
use App\Models\Todo;

class Category extends Model
{
    use HasFactory;

        protected $hidden = ['parent_id','created_at', 'updated_at'];
        
        public function notes()
        {
            return $this->hasMany(Note::class, 'id_category');
        }

        public function todos()
        {
            return $this->hasMany(Todo::class, 'id_category');
        }
}
