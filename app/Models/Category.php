<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

    use HasFactory;
    protected $table = 'category';

    protected $fillable = ['name', 'description'];

    public function quizzes()
    {
     return $this->hasMany(Quiz::class, 'category_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class,'question_id');
    }
    
    public function producedQuestions()
    {
        return $this->hasManyThrough(
            Question::class,    
            Quiz::class,        
                            
        );
    }

}
    


