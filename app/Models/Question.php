<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    //protected $fillable = ['question', 'options', 'answer'];
    protected $fillable = ['question', 'options', 'correct_option', 'quiz_id', 'category_id'];

    // Cast the 'options' column as an array, since it's stored as JSON
    protected $casts = [
        'options' => 'array',
    ];


    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Define a relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class); // Ensure you have the correct namespace for Category
    }



}
