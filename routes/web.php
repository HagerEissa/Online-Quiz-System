<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forgot-password', [AccountController::class, 'forgotPassword'])->name('account.forgotPassword');
Route::post('/process-forgot-password',[AccountController::class,'processForgotPassword'])->name('account.processForgotPassword');
Route::get('/reset-password/{token}',[AccountController::class,'resetPassword'])->name('account.resetPassword');
Route::post('/process-reset-password',[AccountController::class,'processResetPassword'])->name('account.processResetPassword');

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('home');
    //if i want user login ,i will remove -> :admin
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    //user
    Route::get('/profile', [UserController::class, 'showprofile'])->name('profile.show');
    Route::get('/performance', [UserController::class, 'showPerformance'])->name('performance.show');
    Route::get('/categories', [QuizController::class, 'showQuizList'])->name('quiz.list');
    Route::get('/categories/{id}/quizzes', [categoriesController::class, 'showQuizzesByCategory'])->name('quizzes.category');

    Route::get('/quiz/{id}', [QuizController::class, 'show'])->name('quizzes.show');


    
});
Route::middleware('auth')->group(function () {
Route::get('admin/index', [AdminController::class, 'index'])->name('admin.dashboard');
//////////////////////////////////students///////////////////////////////////
Route::get('admin/students', [AdminController::class, 'students'])->name('admin.students');
Route::get('admin/createstudent', [AdminController::class, 'createstudent'])->name('admin.createstudent');
Route::post('admin/storestudent', [AdminController::class, 'storestudent'])->name('admin.storestudent');
Route::delete('admin/student/delete/{id}', [AdminController::class, 'deletestudent'])->name('student.delete');
///////////////////////////questions//////////////////////////////////////////////
Route::get('admin/questions', [AdminController::class, 'questions'])->name('admin.questions');
Route::get('admin/add-question',[AdminController::class,'createquestion'])->name('admin.createquestion');
Route::post('admin/store-question',[AdminController::class,'storeQuestion'])->name('store.question');
Route::get('/admin/question/edit/{id}', [AdminController::class, 'editquestion'])->name('question.edit');
Route::post('/admin/question/update/{id}', [AdminController::class, 'updateQuestion'])->name('question.update');
Route::delete('admin/question/delete/{id}', [AdminController::class, 'deleteQuestion'])->name('question.delete');
////////////////////quizzes///////////////////////////////////////////////////////////
Route::get('admin/quizzes', [AdminController::class, 'quizzes'])->name('admin.quizzes');
Route::post('admin/store-quiz',[AdminController::class,'storeQuiz'])->name('store.quiz');
Route::get('admin/add-quiz',[AdminController::class,'createquiz'])->name('create.quiz');
Route::get('/admin/quiz/edit/{id}', [AdminController::class, 'editquiz'])->name('quiz.edit');
Route::post('/admin/quiz/update/{id}', [AdminController::class, 'updatequiz'])->name('quiz.update');
Route::delete('admin/quiz/delete/{id}', [AdminController::class, 'deletequiz'])->name('quiz.delete');
//////////categories//////////////////////////////////////////////////////////////////
Route::get('admin/categories', [AdminController::class, 'displaycategories'])->name('admin.categories');
Route::get('/admin/category/edit/{id}', [AdminController::class, 'editcategories'])->name('category.edit');
Route::post('admin/category/update/{id}', [AdminController::class, 'updateCategory'])->name('category.update');
Route::delete('admin/category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('category.delete');
Route::get('admin/category/create', [AdminController::class, 'createCategory'])->name('category.create');
Route::post('admin/category/store', [AdminController::class, 'storeCategory'])->name('category.store');
////////////////rank of score////////////////////////
Route::get('admin/results/', [AdminController::class, 'displayresults'])->name('display.results');
Route::delete('admin/rankandscore/delete/{id}', [AdminController::class, 'deleterank'])->name('rankandscore.delete');


/////////for user/////////////////////////////////////////////////

Route::get('/categories/{id}/quizzes', [categoriesController::class, 'showQuizzesByCategory'])->name('quizof.category');

///////
Route::get('/quiz/{id}', [QuizController::class, 'show'])->name('quizzes.show');

Route::get('/questions/level/{level}/{category}', [QuizController::class, 'showByLevelAndCategory'])->name('questions.byLevelandcategory');
Route::post('/quiz/submit', [QuizController::class, 'submitAnswer'])->name('quiz.submitAnswer');
Route::get('user/results', action: [QuizController::class, 'results'])->name('user.results');
Route::get('user/contact_us', action: [HomeController::class, 'contactus'])->name('user.contactus');


});

Route::get('/admin/notifications/clear', [AdminController::class, 'clearNotifications'])
    ->name('notifications.clear')
    ->middleware('auth');




require __DIR__.'/auth.php';

// Route::get('/users', [UserController::class, 'showUsers']);

// Route::get('/try', [HomeController::class, 'index'])->name('home');


Route::get('/ll', function () {
    return view('login');
});


