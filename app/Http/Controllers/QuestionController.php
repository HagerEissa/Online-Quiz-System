<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Session as Session;

class QuestionController extends Controller
{
    public function showQuestion($quizId, $questionIndex)
{
    $quiz = Quiz::findOrFail($quizId);
    $question = $quiz->questions()->skip($questionIndex - 1)->first();

    // Check if there are no more questions
    if (!$question) {
        return redirect()->route('quiz.completed', ['quizId' => $quizId]);
    }

    return view('quiz.question', compact('quiz', 'question', 'questionIndex'));
}

public function submitAnswer(Request $request, $quizId, $questionIndex)
{
    $request->validate([
        'user_id' => 'required|integer',
        'question_id' => 'required|integer',
        'user_answer' => 'required|string',
    ]);

    // Check if the answer is correct
    $correctAnswer = Question::find($request->question_id)->correct_answer;
    $isCorrect = $request->user_answer === $correctAnswer;

    // Store the answer
    UserAnswer::create([
        'user_id' => $request->user_id,
        'quiz_id' => $quizId,
        'question_id' => $request->question_id,
        'user_answer' => $request->user_answer,
        'is_correct' => $isCorrect,
    ]);

    // Redirect to the next question
    return redirect()->route('quiz.showQuestion', ['quizId' => $quizId, 'questionIndex' => $questionIndex + 1]);
}
}
