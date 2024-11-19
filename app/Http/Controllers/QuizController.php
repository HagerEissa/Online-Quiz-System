<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;
class QuizController extends Controller
{
    public function showQuizList()
    {
        $categories = Category::all(); // Fetch all quizzes

        return view('QuizList', compact('categories'));

    }
    // Handle quiz submission and calculate the result
    // public function submitQuiz(Request $request, $quizId)
    // {
    //     $quiz = Quiz::with('questions')->findOrFail($quizId);
    //     $userId = Auth::id(); // Get the currently authenticated user's ID
    //     $totalQuestions = $quiz->questions->count();
    //     $correctAnswers = 0;
    //     $wrongAnswers = 0;

    //     // Loop through each question and compare the user's answer
    //     foreach ($quiz->questions as $question) {
    //         $userAnswer = $request->input('answer_' . $question->id);
    //         $isCorrect = $userAnswer == $question->correct_answer;

    //         // Save the user's answer
    //         UserAnswer::create([
    //             'user_id' => $userId,
    //             'quiz_id' => $quiz->id,
    //             'question_id' => $question->id,
    //             'user_answer' => $userAnswer,
    //             'is_correct' => $isCorrect,
    //         ]);

    //         // Count correct and wrong answers
    //         if ($isCorrect) {
    //             $correctAnswers++;
    //         } else {
    //             $wrongAnswers++;
    //         }
    //     }

    //     // Calculate the user's score (percentage)
    //     $score = ($correctAnswers / $totalQuestions) * 100;

    //     // Determine if the user has passed
    //     $hasPassed = $score >= 50; // 50% passing score

    //     // Show result to the user
    //     return view('quiz.result', [
    //         'quiz' => $quiz,
    //         'correctAnswers' => $correctAnswers,
    //         'wrongAnswers' => $wrongAnswers,
    //         'score' => $score,
    //         'hasPassed' => $hasPassed,
    //     ]);
    // }
    ////////////

    public function showByLevelAndCategory($level, $category)
    {
        // Fetch questions where the related quiz has the given level and the category matches
        $questions = Question::with('quiz', 'category') // Eager load quiz and category relationships
            ->whereHas('quiz', function($query) use ($level) {
                $query->where('level', $level); // Filtering quizzes by level
            })
            ->whereHas('category', function($query) use ($category) {
                $query->where('name', $category); // Assuming 'name' is the column for category name
            })
            ->get();

        // Check if any questions were found
        if ($questions->isEmpty()) {
            return redirect()->back()->with('error', 'No questions found for this level and category');
        }

        // Return the questions to the view
        return view('QuizPage', compact('questions'));
    }

    public function submitAnswer(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|integer',
            'quiz_id' => 'required|integer',
            'answers' => 'required|array',
            'answers.*' => 'required|string',
            'time_spent' => 'required|integer', // Validate time spent as an integer
        ]);

        // Initialize correct and incorrect answer counts
        $correct = 0;
        $incorrect = 0;

        // Retrieve the quiz score for that specific quiz
        $quiz = Quiz::select('quiz_score')->where('id', $request->quiz_id)->first();
        $total = (int) ($quiz->quiz_score ?? 0);

        // Loop through the submitted answers
        foreach ($request->answers as $questionId => $userAnswer) {
            // Fetch the question being answered
            $question = Question::findOrFail($questionId);

            // Determine if the answer is correct
            $isCorrect = $question->correct_option === $userAnswer;

            // Increment counters based on correctness
            if ($isCorrect) {
                $correct += 1;
            } else {
                $incorrect += 1;
            }

            // Store each answer in the user_answers table
            UserAnswer::create([
                'user_id' => $request->user_id,
                'quiz_id' => $request->quiz_id,
                'question_id' => $questionId,
                'user_answer' => $userAnswer,
                'is_correct' => $isCorrect,
            ]);
        }

        // Calculate total score based on correct answers (e.g., each correct answer scores 2 points)
        $achievedScore = $correct * 2;

        // Store the user's overall result in the Result table
        Result::create([
            'user_id' => Auth::user()->id,
            'quiz_id' => $request->quiz_id,
            'quiz_score' => $total,
            'achieved_score' => $achievedScore,
            'correct_answers' => $correct,
            'incorrect_answers' => $incorrect,
            'time_spent' => $request->time_spent, // Use the time spent from the request
        ]);

        // Redirect to results or the next action
        return redirect()->route('user.results');
    }









public function results(){
    $user = Auth::user();
    $category= Category::all();
    $results = Result::with(['user','quiz'])->where('user_id', $user->id)->paginate(5);
    return view('Performance',compact('results','category'));
}







}
