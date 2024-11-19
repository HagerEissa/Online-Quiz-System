<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'quiz_id',
        'quiz_score',
        'achieved_score',
        'time_spent',
        'correct_answers',
        'incorrect_answers',
        ];

        // public function quiz(){
        //     $this->belongsTo(Quiz::class);
        // }
        public function quiz()
        {
            return $this->belongsTo(Quiz::class);
        }

        // public function user(){
        //     $this->belongsToMany(User::class);
        // }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        
}
