<?php

use App\Http\Controllers\CourseAuthorController;
use App\Http\Controllers\CourseCatagoryController;
use App\Http\Controllers\CourseChildCatagoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseConversationController;
use App\Http\Controllers\CourseCurriculumnController;
use App\Http\Controllers\CourseEnrollController;
use App\Http\Controllers\CourseMcqsController;
use App\Http\Controllers\CourseNewsorArticleController;
use App\Http\Controllers\CourseNoteController;
use App\Http\Controllers\CourseOtherController;
use App\Http\Controllers\CoursePricingController;
use App\Http\Controllers\CourseReviewController;
use App\Http\Controllers\CourseSubCatagoryController;
use App\Http\Controllers\CourseVideoController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\QuestionsBankController;
use App\Http\Controllers\QuizAnswerOptionController;
use App\Http\Controllers\QuizAuthorController;
use App\Http\Controllers\QuizCatagoriesController;
use App\Http\Controllers\QuizChildCatagoriesController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizEnrollController;
use App\Http\Controllers\QuizPricingController;
use App\Http\Controllers\QuizQuestionsBankController;
use App\Http\Controllers\QuizQuestionsController;
use App\Http\Controllers\QuizSubCatagoriesController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('courseCatagory', CourseCatagoryController::class);

Route::apiResource('courseSubCatagory', CourseSubCatagoryController::class);

Route::apiResource('courseChildCatagory', CourseChildCatagoryController::class);

Route::apiResource('course', CourseController::class);

Route::apiResource('courseCurriculumn', CourseCurriculumnController::class);

Route::apiResource('courseMcqs', CourseMcqsController::class);

Route::apiResource('courseVideo', CourseVideoController::class);

Route::apiResource('courseNote', CourseNoteController::class);

Route::apiResource('courseNewsorArticle', CourseNewsorArticleController::class);

Route::apiResource('courseOthers', CourseOtherController::class);

Route::apiResource('courseReview', CourseReviewController::class);

Route::apiResource('courseConversation', CourseConversationController::class);

Route::apiResource('coursePricing', CoursePricingController::class);

Route::apiResource('courseAuthor', CourseAuthorController::class);

Route::apiResource('teacher', TeacherController::class);

Route::apiResource('quizCatagories', QuizCatagoriesController::class);

Route::apiResource('quizSubCatagories', QuizSubCatagoriesController::class);

Route::apiResource('quizChildCatagories', QuizChildCatagoriesController::class);

Route::apiResource('quiz', QuizController::class);

Route::apiResource('quizPricing', QuizPricingController::class);

Route::apiResource('quizAuthor', QuizAuthorController::class);

Route::apiResource('quizQuestions', QuizQuestionsController::class);

Route::apiResource('questionsBank', QuestionsBankController::class);

Route::apiResource('quizQuestionBank', QuizQuestionsBankController::class);

Route::apiResource('quizAnswerOption', QuizAnswerOptionController::class);

Route::apiResource('user', UsersController::class);

Route::apiResource('courseEnroll', CourseEnrollController::class);

Route::apiResource('quizEnroll', QuizEnrollController::class);

Route::apiResource('payments', PaymentsController::class);