<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'duration',
        'level',
        'category_id'
        ];

        // public function question(){
        //     return $this->hasMany(Question::class);
        // }
        public function questions()
        {
            return $this->hasMany(Question::class);
        }

        public function result(){
            return $this->hasMany(Result::class);
        }

        public function category()
        {
            return $this->belongsTo(Category::class, 'category_id');
        }
}
