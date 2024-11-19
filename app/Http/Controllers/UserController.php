<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    // public function showUsers()
    // {
    //     // Fetch all users whose type is 'user'
    //     //$users = User::get();//this get all users in table users,because of UserScope
    //     $users = Admin::get();//this get all Admins in table users,because of AdminScope

    //     // Return the users data to the Blade view
    //     return view('users.index', compact('users'));
    // }

    // public function showprofile(){
    //     return view('profile');
    // }

    public function showProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user(); // Get the authenticated user
        //Check if quizzesTaken method exists
        if (method_exists($user, 'quizzesTaken')) {
            $user = User::with(['quiz', 'result', 'quizzesTaken'])->find(Auth::id());// Eager load quizzesTaken relationship
        }
        //dd($user);
        $totalQuizzesTaken = $user->quizzesTaken()->count(); // Get the total quizzes taken

        // Fetch performance history
        $performanceHistory = $user->quizzesTaken;

        // Calculate other metrics
        $averageScore = $user->quizzesTaken()->avg('achieved_score'); // Calculate average score
        $highestScore = $user->quizzesTaken()->max('achieved_score'); // Calculate highest score

        // Get quiz performance history
        $quizHistory = Result::with('quiz') // Eager load the Quiz relationship
            ->where('user_id', $user->id)->orderBy('achieved_score', 'desc') // Order by score in descending order
            ->take(3) // Use $user->id to get the user_id
            ->get(['quiz_id', 'quiz_score','achieved_score', 'created_at','time_spent']);


        return view('profile', compact('user', 'totalQuizzesTaken', 'performanceHistory', 'averageScore', 'highestScore' ,'quizHistory'));
    }

    // public function showPerformance()
    // {
    //     return view('performance');
    // }
    public function showPerformance()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        // Fetch the performance history from the results table
        $performanceHistory = Result::with('quiz') // Eager load the quiz relationship
            ->where('user_id', $user->id)
            ->get();

        return view('performance', [
            'performanceHistory' => $performanceHistory,
        ]);
    }


    }


