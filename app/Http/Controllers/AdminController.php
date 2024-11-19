<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;

use App\Models\Category;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    

    public function index()
    {
        $users = User::select()->where('type','user')->count();
        $admins = User::select()->where('type','admin')->count();
        return view('admins.index', compact('users','admins'));
    }


    public function clearNotifications()
{
    if (Auth::check() && Auth::user()->type === 'admin') {
        $user = Auth::user(); // Use the default guard to get the authenticated user

        if ($user) {
            // Retrieve all notifications for the user
            $notifications = $user->notifications;

            // Loop through each notification and delete it
            foreach ($notifications as $notification) {
                $notification->delete();
            }

            return redirect()->back()->with('status', 'Notifications cleared!');
        }
    }

    return redirect()->back()->with('error', 'User not found.');
}
    public function displaycategories()
    {
        $categories = Category::all();
        return view('admins.category.categories',compact('categories')); // Create a view at resources/views/admin/admins.blade.php
    }
    public function editcategories($id)

    {

        $category= Category::find($id);

        return view('admins.category.editcategory', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
    ]);

    // Find the category by ID
    $category = Category::findOrFail($id);

    // Update category attributes
    $category->name = $validatedData['name'];
    $category->description = $validatedData['description'];

    // Save the updated category
    if ($category->save()) {
        return redirect()->route('admin.categories')->with('update', 'Category updated successfully');
    } else {
        return redirect()->route('admin.categories')->with('error', 'Failed to update category');
    }
}

public function deleteCategory($id)
{
    $category = Category::findOrFail($id);

    // Delete the category
    if ($category->delete()) {
        return redirect()->route('admin.categories')->with('delete', 'Category deleted successfully');
    } else {
        return redirect()->route('admin.categories')->with('error', 'Failed to delete category');
    }
}
        
public function createCategory(){
    return view('admins.category.createcategory');
}
public function storeCategory(Request $request){
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
    ]);

    // Create a new admin
    $storecategories = Category::create([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
    ]);

        if ($storecategories) {
            return redirect()->route('admin.categories')->with('success', 'category added successfully');
        }
    }
    
////////////////////////////////////categories/////////////////////////////////////////////////

    // Show the list of quizzes
   

    // Show the list of students
    public function students()
    {
        // Fetch all students
        $students = User::select()->where('type','user')->get();// Adjust according to your Student model
        return view('admins.student.students',compact('students')); // Create a view at resources/views/admin/students.blade.php
    }

    // Show the form to create a new question
    
    public function createstudent(){
        return view('admins.student.createstudent');
    }

    public function storestudent(Request $request)
    {


    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Create a new admin
    $storeusers = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'type' => 'user',
    ]);

        if ($storeusers) {
            return redirect()->route('admin.students')->with('success', 'Student added successfully');
        }
    }

    public function deletestudent($id)
{
    $user = User::findOrFail($id);

    // Delete the category
    if ($user->delete()) {
        return redirect()->route('admin.students')->with('delete', 'student deleted successfully');
    } else {
        return redirect()->route('admin.students')->with('error', 'Failed to delete category');
    }
}

 /////////////////////////students//////////////////////////////////////
    public function questions()
    {
        $questions = Question::paginate(5);
        return view('admins.question.questions',compact('questions')); 
    }

    public function createquestion()
    {
        // Fetch all quizzes
        $quizzes = Quiz::all(); // Fetch all quizzes
    
        // Create an associative array for levels and their IDs
        $quizLevels = [];
        foreach ($quizzes as $quiz) {
            $quizLevels[$quiz->level] = $quiz->id; // Level as key and ID as value
        }
        
        $categories = Category::get();
        
        return view('admins.question.createquestion', compact('quizLevels', 'categories'));
    }
public function storeQuestion(Request $request) {
    

    $request->validate([
        'quiz_id' => 'required|integer',
        'question' => 'required|string',
        'option_a' => 'required|string',
        'option_b' => 'required|string',
        'option_c' => 'required|string',
        'option_d' => 'required|string',
        'correct_option' => 'required|in:option_a,option_b,option_c,option_d',
        'category_id' => 'required|integer', // Ensure category_id is validated
    ]);

    // Build the options array from the request
    $options = [
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'option_d' => $request->option_d,
    ];

    // Fetch quiz and category by their IDs
    $quiz = Quiz::findOrFail($request->quiz_id);
    $category = Category::findOrFail($request->category_id); // Ensure category_id is used

    // Create the question record
    $question = new Question();
    $question->question = $request->question;
    $question->correct_option = $options[$request->correct_option];
    $question->options = json_encode($options);
    $question->quiz_id = $quiz->id; // Store quiz_id
    $question->category_id = $category->id; // Store category_id correctly

    // Save the question record to the database
    $question->save();

    return redirect()->route('admin.questions')->with('success', 'Question created successfully.');
}

public function editquestion($id) {
    $question = Question::find($id);
    $quizzes = Quiz::all(); // Fetch all quizzes
    
    // Create an associative array for levels and their IDs
    $quizLevels = [];
    foreach ($quizzes as $quiz) {
        $quizLevels[$quiz->level] = $quiz->id; // Level as key and ID as value
    }

    $categories = Category::all();
    return view('admins.question.editquestion', compact('quizLevels', 'categories', 'question'));
}

public function updateQuestion(Request $request, $id) {
    // Find the existing question by ID
    $question = Question::findOrFail($id);

    $request->validate([
        'quiz_id' => 'required|integer',
        'question' => 'required|string',
        'option_a' => 'required|string',
        'option_b' => 'required|string',
        'option_c' => 'required|string',
        'option_d' => 'required|string',
        'correct_option' => 'required|in:option_a,option_b,option_c,option_d',
        'category_id' => 'required|integer',
    ]);

    // Build the options array from the request
    $options = [
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'option_d' => $request->option_d,
    ];

    // Fetch quiz and category by their IDs
    $quiz = Quiz::findOrFail($request->quiz_id);
    $category = Category::findOrFail($request->category_id);

    // Update the question record
    $question->question = $request->question;
    $question->correct_option = $options[$request->correct_option];
    $question->options = json_encode($options);
    $question->quiz_id = $quiz->id; 
    $question->category_id = $category->id; 

    // Save the updated question record to the database
    $question->save();

    return redirect()->route('admin.questions')->with('update', 'Question updated successfully.');
}

public function deleteQuestion($id) {
    // Find the existing question by ID
    $question = Question::findOrFail($id);

    // Delete the question from the database
    $question->delete();

    return redirect()->route('admin.questions')->with('delete', 'Question deleted successfully.');
}

/////////////////////////questions///////////////////////////////////
    public function quizzes()
    {
        // Fetch all quizzes
        $quizzes = Quiz::with(['category','result'])->get(); // Adjust according to your Quiz model
        return view('admins.quiz.quizzes',compact('quizzes')); // Create a view at resources/views/admin/quizzes.blade.php
    }

 public function createquiz(){
    $categories = Category::get();
    return view('admins.quiz.createquiz',compact('categories'));
 }
public function storeQuiz(Request $request) {
    $request->validate([
        'title' => 'required|string',
        'duration' => 'required|int',
        'level' => 'required|string',
        'quiz_score' => 'required|string',
        'category_id' => 'required|integer', // Ensure category_id is validated
    ]);

    // Build the options array from the request
    

    // Fetch quiz and category by their IDs
    
    $category = Category::findOrFail($request->category_id); // Ensure category_id is used
    // Create the question record
    $quiz = new Quiz();
    $quiz->title = $request->title;
    $quiz->duration = $request->duration;
    $quiz->level = $request->level;
    $quiz->user_id = Auth::user()->id;

    $quiz->quiz_score = $request->quiz_score;
    $quiz->category_id = $category->id; // Store category_id correctly

    // Save the question record to the database
    $quiz->save();

    return redirect()->route('admin.quizzes')->with('success', 'Quiz created successfully.');
}

public function editquiz($id)
{
    $quiz = Quiz::find($id);
    $categories = Category::all(); // Assuming you have a Category model

    return view('admins.quiz.editquiz', compact('quiz', 'categories'));
}

public function updatequiz(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'title' => 'required|string',
        'duration' => 'required|numeric',
        'level' => 'required|string',
        'quiz_score' => 'required|string',
        'category_id' => 'required|integer', // Ensure category_id is validated
    ]);

    // Find the quiz by ID
    $quiz = Quiz::findOrFail($id);

    // Update quiz attributes
    $quiz->title = $validatedData['title'];
    $quiz->duration = $validatedData['duration'];
    $quiz->level = $validatedData['level'];
    $quiz->quiz_score = $validatedData['quiz_score'];
    $quiz->category_id = $validatedData['category_id']; // Set the selected category

    // Save the updated quiz
    if ($quiz->save()) {
        return redirect()->route('admin.quizzes')->with('update', 'Quiz updated successfully');
    } else {
        return redirect()->route('admin.quizzes')->with('error', 'Failed to update quiz');
    }
}
public function deletequiz($id)
{
    $quiz = Quiz::findOrFail($id);

    // Delete the category
    if ($quiz->delete()) {
        return redirect()->route('admin.quizzes')->with('delete', 'Quiz deleted successfully');
    } else {
        return redirect()->route('admin.quizzes')->with('error', 'Failed to delete quiz');
    }
}

public function displayresults(){
    $results = Result::with(['quiz','user'])->paginate(5);
    
    return view('admins.results',compact('results'));
}

public function deleterank($id)
{
    $result = Result::findOrFail($id);

    // Delete the category
    if ($result->delete()) {
        return redirect()->route('display.results')->with('delete', 'Results deleted successfully');
    } else {
        return redirect()->route('display.results')->with('error', 'Failed to delete result');
    }
}

}



