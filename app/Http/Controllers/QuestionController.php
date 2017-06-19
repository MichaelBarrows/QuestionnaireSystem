<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Used to access the custom functions in app/helpers.php
use App\Helpers;
// Used to access the question model
use App\question;
use App\Http\Requests;

/**
 * Class QuestionController
 * Object to handle request involving questions (admin)
 * @package App\Http\Controllers
 */
class QuestionController extends Controller
{
    /**
     * QuestionController constructor.
     * Ensures the user is logged in to access the admin pages
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a question
     * Gets the questionnaire from the database using the getQuestionnaireByID() function with the $id parameter (to be sent to the view)
     * Checks the user is authorised to create the answer using the checkAuth() function
     *  - If the user is the author, the view to create the answer is displayed (admin/answer/create)
     *  - If the user is not the author, the error view is displayed (admin/unauthorised-error)
     *
     * Returns the view to create a question, using the parameter of $questionnaireid to determine which questionnaire
     * the answer should be added to and displays the questionnaire title to the user.
     * @param $questionnaireid
     * @return mixed
     */
    public function create($id)
    {
        // Gets the question from the database (returns object)
        $questionnaire = Helpers\getQuestionnaireByID($id);
        // Gets the number attribute for the next question (returns int)
        $next_question_number = Helpers\getNextQuestionNumber($questionnaire->id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // The create view is returned with the contents of the $questionnaire and the $question_number variables
            return view('admin.question.create', ['questionnaire' => $questionnaire, 'question_number' => $next_question_number]);
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Stores the users question input from the create method in the database and redirects the user to the questionnaire
     * they have just created.
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        // Validates the users input
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        // Gets the questionnaire from the database using the question_id (returns object)
        $questionnaire = Helpers\getQuestionnaireByID($request->questionnaire_id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Creates the question
            question::create($request->all());
            // Redirects the user to the page which shows a question with it's answers
            return redirect("admin/questionnaires/$request->questionnaire_id");
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Returns the view that displays a question with its answers to the user.
     * @param $id - $question->id
     * @return mixed
     */
    public function show($id)
    {
        // Gets the question from the database using the $id (returns object)
        $question = Helpers\getQuestionByID($id);
        // Gets the answers from the database using the $question->id (returns object)
        $answers = Helpers\getAnswersByQuestionID($question->id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($question->questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Returns the show view for the question with the contents of the $answers variable (to populate the page)
            return view('admin.question.show', ['answers' => $answers, 'question' => $question]);
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Returns the form to edit a question, uses the checkAuth method to ensure the user has permission to edit the
     * selected question. If the user does not have permission to edit, an unauthorised error page is displayed.
     * @param $id - $question->id
     * @return mixed
     */
    public function edit($id)
    {
        // Gets the question from the database (returns object)
        $question = Helpers\getQuestionByID($id);
        // Checks if the user is the author of the questionnaire
        $ownerCheck = Helpers\checkAuth($question->questionnaire_id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Returns the edit view for the question with the contents of the $question variable (to populate the form)
            return view('admin.question.edit', ['question' => $question]);
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Stores the users updated question input in the database and redirects the user to the questionnaire to which the
     * question belonged
     * @param Request $request - User inputted data (updated question)
     * @param $id - $question->id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        // Validates the users input
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        // Gets the question from the database (returns object)
        $question = Helpers\getQuestionByID($id);
        // Checks if the user is the author of the questionnaire
        $ownerCheck = Helpers\checkAuth($question->questionnaire_id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Updates the question in the database
            $question->update($request->all());
            // Redirects the user to the page which shows a question with it's answers
            return redirect("admin/questionnaires/$question->questionnaire_id");
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * CONFIRM USERS CHOICE
     * Deletes a question from the database and redirects the user to the questionnaire to which it belonged. Will also
     * delete any answers and responses associated with this question.
     * @param $id - $question->id
     * @return mixed
     */
    public function destroy($id)
    {
        // Gets the question from the database (returns object)
        $question = Helpers\getQuestionByID($id);
        // Checks if the user is the author of the questionnaire
        $ownerCheck = Helpers\checkAuth($question->questionnaire_id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Deletes the question from the database
            $question->delete();
            // Redirects the user to the page which shows a question with it's answers
            return redirect("admin/questionnaires/$question->questionnaire_id");
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }
}