<?php

use App\Http\Controllers\adminpanelController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookmarkcourseController;
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
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\frontendController;
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
use App\Http\Controllers\QuizsolutionController;
use App\Http\Controllers\QuizSubCatagoriesController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherDiscussionController;
use App\Http\Controllers\uploadController;
use App\Http\Controllers\UsersController;
use App\Models\CourseCatagory;
use App\Models\CourseEnroll;
use App\Models\CoursePricing;
use App\Models\CourseSubCatagory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/userportal', function () {
//     return view('frontend.index');

// });

Route::get('/selectItemsFromBasket/{userid}', [BasketController::class, 'selectItemsFromBasket']);
Route::get('/addtobasket/{course_id}/{pricing_id}/{type}', [BasketController::class, 'store']);
Route::get('/remove-basket/{course_or_quiz_id}/{pricing_id}/{type}/{user_id}', [BasketController::class, 'removeItemFromBasket']);
Route::get('/basketDetails', [BasketController::class, 'selectItemsFromBasket']);

Route::get('/complete-payment', [BasketController::class, 'completePayment']);
Route::get('/complete-payment-sucess', [BasketController::class, 'completePaymentSucess']);

Route::get('/userportal', [frontendController::class, 'selectDataForIndexPage']);
Route::get('/blogdetails/{id}', [frontendController::class, 'blogdetails']);
Route::get('/coursedetails/{id}', [frontendController::class, 'coursedetails']);
Route::get('/coursesubdetails/{subcourse}/{id}', [frontendController::class, 'coursesubdetails']);
Route::get('/quizdetails/{id}', [frontendController::class, 'quizdetails']);
Route::get('/basket', [frontendController::class, 'basket']);

Route::get('/all-courses', [frontendController::class, 'allCourses']);
Route::get('/savethiscourse/{course_id}/{user_id}/{type}', [BookmarkcourseController::class, 'store']);
Route::get('/removethiscourse/{course_id}/{user_id}/{type}', [BookmarkcourseController::class, 'destroy']);
Route::get('/coursecontent/{course_id}/{id}/{subcourse}', [frontendController::class, 'coursecontent']);

Route::get('/quizcontent/{quiz_id}', [frontendController::class, 'quizcontent']);

Route::post('quizsolution', [QuizsolutionController::class, 'store']);
Route::get('/leaderboard/{user_id}/{quiz_id}', [QuizsolutionController::class, 'selectLeaderBoard']);
Route::get('/addUser', function () {
    return view('user.add');
});

Route::get('/logout-user', function () {
    session()->forget('sessionUserId');
    return redirect('/userportal');
});

Route::get('/user-dashboard', [frontendController::class, 'userdashboard']);
Route::get('/user-register', function () {
    return view('frontend.pages.register');
});
Route::get('/user-login', function () {
    return view('frontend.pages.login');
});
Route::post('/askQuestionToTeacher', [TeacherDiscussionController::class, 'store']);
Route::put('/postBlogComment', [BlogCommentController::class, 'store']);
Route::post('/addUserData', [UsersController::class, 'store']);
Route::post('/updateUserData', [UsersController::class, 'updateUserProfile']);
Route::post('/updatePassword', [UsersController::class, 'updatePassword']);
Route::post('/userLogin', [UsersController::class, 'login']);

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/', [frontendController::class, 'selectDataForIndexPage']);

// Route::get('/home', function () {
//     return view('adminpage.home');
// });
Route::get('/admin-dashboard', [adminpanelController::class, 'index']);

Route::post('/upload', [uploadController::class, 'uploadImage']);
Route::post('/uploadprofile', [uploadController::class, 'uploadprofile']);
Route::post('/uploadVideo', [uploadController::class, 'uploadVideo']);
Route::post('/uploadNote', [uploadController::class, 'uploadNote']);
Route::post('/coursecatagory', [CourseCatagoryController::class, 'store'])->name('addcoursecatagory');

Route::post('/coursesubcatagory', [CourseSubCatagoryController::class, 'store']);

Route::post('/coursechildcatagory', [CourseChildCatagoryController::class, 'store']);

Route::post('/addQuizCatagories', [QuizCatagoriesController::class, 'store']);

Route::post('/addQuizSubCatagories', [QuizSubCatagoriesController::class, 'store']);

Route::post('/addChildCatagories', [QuizChildCatagoriesController::class, 'store']);



Route::post('/addQuizData', [QuizController::class, 'store']);

Route::post('/addQuizPricing', [QuizPricingController::class, 'store']);

Route::post('/addAuthor', [QuizAuthorController::class, 'store']);
Route::post('/storeQuestionsFromAnotherQuiz', [QuizQuestionsController::class, 'storeQuestionsFromAnotherQuiz']);
Route::post('/addQuizQuestions', [QuizQuestionsController::class, 'store']);
Route::get('delete-quiz-question/{question_id}/{quiz_id}', [QuizQuestionsController::class, 'destroy']);
Route::get('edit-quiz-question/{question_id}', [QuizQuestionsController::class, 'edit']);
Route::get('getQuestionsByQuizId/{quiz_id}', [QuizQuestionsController::class, 'getQuestionsByQuizId']);

Route::get('getQuestionsByBankId/{bank_id}', [QuizQuestionsController::class, 'getQuestionsByBankId']);

Route::post('/addQuestionsBank', [QuestionsBankController::class, 'store']);
Route::get('/searchQuestionBank', [QuestionsBankController::class, 'searchQuestionBank']);
Route::get('/edit-questionsBank/{question_bank_id}', [QuestionsBankController::class, 'edit']);
Route::GET('update-questionsBank/{question_bank_id}', [QuestionsBankController::class, 'update']);
Route::get('delete-questionsBank/{question_bank_id}', [QuestionsBankController::class, 'destroy']);

Route::get('/questionbank', [QuestionsBankController::class, 'index']);

Route::post('/addQuizQuestionsBank', [QuizQuestionsBankController::class, 'store']);

Route::post('/addQuizAnswerOption', [QuizAnswerOptionController::class, 'store']);

Route::post('/addBlogData', [BlogController::class, 'store']);

Route::post('/addCustomersData', [CustomerController::class, 'store']);






Route::post('addcourseData', [CourseController::class, 'store']);

Route::post('addcourseCurriculumnData', [CourseCurriculumnController::class, 'store']);

Route::get('delete-course-curriculumn/{id}/{courseId}', [CourseCurriculumnController::class, 'destroy']);



Route::post('/addcourseMcqsData', [CourseMcqsController::class, 'store']);
Route::get('delete-course-mcqs/{id}/{courseId}', [CourseMcqsController::class, 'destroy']);

Route::post('/addcourseVideoData', [CourseVideoController::class, 'store']);
Route::get('delete-course-video/{id}/{courseId}', [CourseVideoController::class, 'destroy']);

Route::post('/addcourseNotesData', [CourseNoteController::class, 'store']);
Route::get('delete-course-note/{id}/{courseId}', [CourseNoteController::class, 'destroy']);

Route::post('/addcourseNwsorArtData', [CourseNewsorArticleController::class, 'store']);
Route::get('delete-course-blog/{id}/{courseId}', [CourseNewsorArticleController::class, 'destroy']);

Route::post('/addCourseOther', [CourseOtherController::class, 'store']);
Route::get('delete-course-other-data/{id}/{courseId}', [CourseOtherController::class, 'destroy']);
Route::post('/addCourseReview', [CourseReviewController::class, 'store']);
Route::get('delete-course-review/{id}/{courseId}', [CourseReviewController::class, 'destroy']);

Route::post('/addCourseConversation', [CourseConversationController::class, 'store']);

Route::post('/addCoursePricing', [CoursePricingController::class, 'store']);

Route::post('/addCourseAuthor', [CourseAuthorController::class, 'store']);

Route::post('/addTeacher', [TeacherController::class, 'store']);

Route::post('/addUserData', [UsersController::class, 'store']);



Route::post('/addCourseEnrollData', [CourseEnrollController::class, 'store']);

Route::post('/addQuizEnrollData', [QuizEnrollController::class, 'store']);
Route::get('/searchQuiz', [QuizController::class, 'searchQuiz']);
Route::get('/searchBlog', [BlogController::class, 'searchBlog']);

Route::post('/addPaymentData', [PaymentsController::class, 'store']);



Route::get('/coursecatagory', [CourseSubCatagoryController::class, 'index']);

Route::get('/addQuizCatagory', [QuizCatagoriesController::class, 'index']);

Route::get('/addQuiz', [QuizController::class, 'index']);

Route::get('/addcourse', [CourseController::class, 'index']);
Route::get('/edit-course/{id}', [CourseController::class, 'edit']);

Route::get('/addPayment', [PaymentsController::class, 'index']);
Route::get('/paymentlist', [PaymentsController::class, 'list']);

Route::get('/addTeacher', [TeacherController::class, 'index']);

Route::get('/addBlog', [BlogController::class, 'index']);

Route::get('/addCustomers', [CustomerController::class, 'index']);
Route::get('selectcoursepricing', [CoursePricingController::class, 'selectcoursepricing']);
Route::get('selectquizpricing', [QuizPricingController::class, 'selectquizpricing']);

Route::get('searchuser', [UsersController::class, 'searchuser']);
Route::get('/enroll', [CourseEnrollController::class, 'index']);
Route::get('/listenroll', [CourseEnrollController::class, 'enrollmentlist']);

Route::get('/listcourse', [CourseController::class, 'list']);

Route::get('/listQuiz', [QuizController::class, 'list']);

Route::get('delete-coursecatagory/{cid}', [CourseCatagoryController::class, 'destroy']);

Route::get('delete-coursesubcatagory/{s_cid}', [CourseSubCatagoryController::class, 'destroy']);

Route::get('delete-coursechildcatagory/{child_catagory_id}', [CourseChildCatagoryController::class, 'destroy']);

Route::get('delete-quizcatagory/{qid}', [QuizCatagoriesController::class, 'destroy']);

Route::get('delete-quizsubcatagory/{q_cid}', [QuizSubCatagoriesController::class, 'destroy']);

Route::get('delete-quizchildcatagory/{quiz_child_catagory_id}', [QuizChildCatagoriesController::class, 'destroy']);

Route::get('delete-teacher/{teacher_id}', [TeacherController::class, 'destroy']);

Route::get('delete-blog/{id}', [BlogController::class, 'destroy']);

Route::get('delete-course/{course_id}', [CourseController::class, 'destroy']);

Route::get('delete-quiz/{quiz_id}', [QuizController::class, 'destroy']);
Route::get('edit-quiz/{quiz_id}', [QuizController::class, 'edit']);

Route::get('delete-customers/{customer_id}', [CustomerController::class, 'destroy']);


Route::get('edit-coursecatagory/{cid}', [CourseCatagoryController::class, 'edit']);

Route::get('edit-coursesubcatagory/{s_cid}', [CourseSubCatagoryController::class, 'edit']);

Route::get('edit-coursechildcatagory/{child_catagory_id}', [CourseChildCatagoryController::class, 'edit']);

Route::get('edit-quizcatagory/{qid}', [QuizCatagoriesController::class, 'edit']);

Route::get('edit-quizsubcatagory/{q_cid}', [QuizSubCatagoriesController::class, 'edit']);

Route::get('edit-quizchildcatagory/{quiz_child_catagory_id}', [QuizChildCatagoriesController::class, 'edit']);

Route::get('edit-teacher/{teacher_id}', [TeacherController::class, 'edit']);

Route::get('edit-blog/{id}', [BlogController::class, 'edit']);

Route::get('edit-customer/{customer_id}', [CustomerController::class, 'edit']);



Route::GET('update-coursesubcatagory/{s_cid}', [CourseSubCatagoryController::class, 'update']);

Route::GET('update-coursecatagory/{cid}', [CourseCatagoryController::class, 'update']);

Route::GET('update-coursechildcatagory/{child_catagory_id}', [CourseChildCatagoryController::class, 'update']);

Route::GET('update-quizsubcatagory/{q_sid}', [QuizSubCatagoriesController::class, 'update']);

Route::GET('update-quizcatagory/{qid}', [QuizCatagoriesController::class, 'update']);

Route::GET('update-quizchildcatagory/{quiz_child_catagory_id}', [QuizChildCatagoriesController::class, 'update']);

Route::GET('update-teacher/{teacher_id}', [TeacherController::class, 'update']);

Route::GET('update-blog/{id}', [BlogController::class, 'update']);

Route::GET('update-customer/{customer_id}', [CustomerController::class, 'update']);
