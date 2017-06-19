<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Used to access the custom functions in app/helpers.php
use App\Helpers;
// Used to access the answer model
use App\answer;
use App\Http\Requests;

/**
 * Class AnswersController
 * Object to handle requests involving answers (admin)
 * @package App\Http\Controllers
 */
class AnswersController extends Controller
{
    /**
     * AnswersController constructor.
     * Ensures the user is logged in to access admin pages
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create an answer
     * Returns a form to create an answer, with th equestion, if the user is the author of the questionnaire, if not,
     * returns error page
     * @param $id
     * @return mixed
     */
    public function create($id)
    {
        // Gets the question from the database (returns object)
        $question = Helpers\getQuestionByID($id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($question->questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // The create view is returned with the contents of the $question variable
            return view('admin.answer.create', ['question' => $question]);
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Store a new answer
     * Validates the users input to ensure it meets the requirements
     * Gets the questionnaire from the database using the getQuestionnaireByQuestionID($request->question_id) function
     * Checks the user is authorised to edit the answer using the checkAuth() function
     *  - If the user is the author, the answer is stored and the user is redirected to the view that shows the question
     *    with it's answers is displayed (admin/question/show)
     *  - If the user is not the author, the error view is displayed (admin/unauthorised-error)
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        // Validates the users input
        $this->validate($request, [
            'title' => 'required|max:255',
            'rating' => 'required',
            'question_id' => 'required',
        ]);

        // Gets the questionnaire from the database using the question_id (returns object)
        $questionnaire = Helpers\getQuestionnireByQuestionID($request->question_id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Creates the answer in the database
            answer::create($request->all());
            // Redirects the user to the page which shows a question with it's answers
            return redirect("admin/questions/$request->question_id");
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Edit an answer
     * Gets the answer from the database using the getAnswerByID() function with the $id parameter (to be sent to the view)
     * Checks the user is authorised to edit the answer using the checkAuth() function
     *  - If the user is the author, the view to edit the answer is displayed (admin/answer/edit)
     *  - If the user is not the author, the error view is displayed (admin/unauthorised-error)
     * @param $id - $answer->id
     * @return mixed
     */
    public function edit($id)
    {
        // Gets the answer from the database (returns object)
        $answer = Helpers\getAnswerByID($id);
        // Checks if the user is the author of the questionnaire
        $ownerCheck = Helpers\checkAuth($answer->question->questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Returns the edit view for the answer with the contents of the $answer variable (to populate the form)
            return view('admin.answer.edit', ['answer' => $answer]);
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Update an answer
     * Validates the users input to ensure it meets the requirements
     * Gets the answer from the database using the getAnswerByID($id) function
     * Checks the user is authorised to edit the answer using the checkAuth() function
     *  - If the user is the author, the answer is updated and the user is redirected to the view that shows the question
     *    with it's answers is displayed (admin/question/show)
     *  - If the user is not the author, the error view is displayed (admin/unauthorised-error)
     * @param Request $request - User inputted data (updated answer)
     * @param $id - $answer->id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        // Validates the users input
        $this->validate($request, [
            'title' => 'required|max:255',
            'rating' => 'required',
            'question_id' => 'required',
        ]);

        // Gets the answer from the database (returns object)
        $answer = Helpers\getAnswerByID($id);
        // Checks if the user is the author of the questionnaire
        $ownerCheck = Helpers\checkAuth($answer->question->questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Updates the answer in the database
            $answer->update($request->all());
            // Redirects the user to the page which shows a question with it's answers
            return redirect("admin/questions/$answer->question_id");
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Delete an answer
     * Gets the answer from the database using the getAnswerByID($id) function
     * Checks the user is authorised to delete the answer using the checkAuth() function
     *  - If the user is the author, the answer is deleted and the user is redirected to the view that shows the question
     *    with it's answers is displayed (admin/question/show)
     *  - If the user is not the author, the error view is displayed (admin/unauthorised-error)
     * @param $id - $answer->id
     * @return mixed
     */
    public function destroy($id)
    {
        // Gets the answer from the database (returns object)
        $answer = Helpers\getAnswerByID($id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($answer->question->questionnaire_id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Deletes the answer from the database
            $answer->delete();
            // Redirects the user to the page which shows a question with it's answers
            return redirect("admin/questions/" . $answer->question->id);
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }
}