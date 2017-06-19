<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Home page (public) (take questionnaire)
Route::resource('/', 'AnswerQuestionController@index');
// Redirects to questionnaire first question (public) (take questionnaire)
Route::resource('questionnaire', 'TakeQuestionnaireController');
// Manages responses whilst questionnaire is being taken (public) (take questionnaire)
Route::resource('question', 'AnswerQuestionController');
// Individual question in a questionnaire (public) (take questionnaire)
Route::resource('question/create', 'AnswerQuestionController@create');
// Thank you page and delete responses (public) (take questionnaire)
Route::resource('thank-you', 'ThankYouController@index');
// Responses deleted page (public) (take questionnaire)
Route::resource('responses-deleted', 'ThankYouController@show');

// Enables Auth and Form Errors
Route::group(['middlewareGroups' => ['web']], function () {
    // Allow the user to log in to the admin
    Route::auth();

    // Admin home page
    Route::resource('admin', 'QuestionnaireController@index');
    // Admin questionnaire management
    Route::resource('admin/questionnaires', 'QuestionnaireController');
    // Admin question management
    Route::resource('admin/questions', 'QuestionController');
    // Admin answers management
    Route::resource('admin/answers', 'AnswersController');
    // Admin results management
    Route::resource('admin/results', 'ResultsController');

    // Separate route for the create method on the answer controller so a question id is passed to the view
    Route::resource('admin/answers/create', 'AnswersController@create');
    // Separate route for the create method on the question controller so a questionnaire id is passed to the view
    Route::resource('admin/questions/create', 'QuestionController@create');
});