<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    

    public function showQuizzesByCategory($categoryId) 
    { 
        // Fetch the category and its quizzes 
        $category = Category::with('quizzes')->find($categoryId); 
 
        // Check if the category exists 
        if (!$category) { 
            return redirect()->back()->with('error', 'Category not found'); 
        } 
        $categories = Category::all(); 
        return view('viewquiz', [ 
            'category' => $category, 
            'quizzes' => $category->quizzes, 
            'categories' => $categories 
 
        ]); 
    } 
    public function showALLCategory() 
    { 
        
 
        
        $categories = Category::all(); 
        // dd($category->quizzes); 
 
        return view('QuizList', [ 
             
            'categories' => $categories 
        ]); 
    }
 






public function showByLevelAndCategory($level, $categoryId)
{
    // Find the category by its ID
    $category = Category::findOrFail($categoryId);

    $questions = $category->quizzes() 
        ->where('level', $level) 
        ->with('questions') // Eager load questions associated with the quizzes
        ->get()
        ->pluck('questions') // Get the questions from the quizzes
        ->flatten(); // Flatten the collection to a single array of questions

    // Check if questions are found
    if ($questions->isEmpty()) {
        return redirect()->back()->with('error', 'No questions found for this level and category');
    }

    // Return the view with questions
    return view('QuizPage', compact('questions'));
}
    }
