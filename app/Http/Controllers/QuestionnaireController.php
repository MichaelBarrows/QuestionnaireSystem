<?php

namespace App\Http\Controllers;

// Used to access the custom functions in app/helpers.php
use App\Helpers;
// Used to access the questionnaire model
use App\questionnaire;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class QuestionnaireController
 * Object to handle request involving questionnaires (admin)
 * @package App\Http\Controllers
 */
class QuestionnaireController extends Controller
{
    /**
     * QuestionnaireController constructor.
     * Ensures the user is logged in to access the admin pages
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all questionnaires
     * Returns the index view which shows all questionnaires where the current logged in user is the author.
     * @return mixed
     */
    public function index()
    {
        // Gets all questions from the database that belong tp the user (returns object)
        $questionnaires = Helpers\getQuestionnairesByUserID();
        // The index view is returned with the contents of the $questionnaires variable
        return view('admin.questionnaire.index', ['questionnaires' => $questionnaires]);
    }

    /**
     * Create a questionnaire (in a form)
     * Returns the view to create a questionnaire, returns the user details so the questionnaire can be attributed to
     * them.
     * @return mixed
     */
    public function create()
    {
        // Gets details about the user that is currently logged in (returns object)
        $user = Helpers\getUser();
        // The create view is returned with the contents of the $user variable
        return view('admin.questionnaire.create', ['user' => $user]);
    }

    /**
     * Store the questionnaire (in the database)
     * Stores the users questionnaire input from the create method in the database and redirects the user to the index
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        // Validates the users input
        $this->validate($request, [
            'title' => 'required|max:255',
            'public' => 'required',
            'author_id' => 'required',
        ]);

        // Creates the questionnaire in the database
        questionnaire::create($request->all());
        // Redirects the user to the page which shows all questionnaires
        return redirect('admin/questionnaires');
    }

    /**
     * Show a questionnaire
     * Returns the view that displays a questionnaire with its questions to the user.
     * @param $id - $questionnaire->id
     * @return mixed
     */
    public function show($id)
    {
        // Gets the questionnaire from the database (returns object)
        $questionnaire = Helpers\getQuestionnaireByID($id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // The show view is returned with the contents of the $questionnaire variable
            return view('admin.questionnaire.show', ['questionnaire' => $questionnaire]);
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Edit a questionnaire (in a form)
     * Returns the form to edit a questionnaire, uses the checkAuth method to ensure the user has permission to edit the
     * selected questionnaire. If the user does not have permission to edit, an unauthorised error page is displayed.
     * @param $id - $questionnaire->id
     * @return mixed
     */
    public function edit($id)
    {
        // Gets details about the user that is currently logged in (returns object)
        $user = Helpers\getUser();
        // Gets the questionnaire from the database (returns object)
        $questionnaire = Helpers\getQuestionnaireByID($id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // The edit view is returned with the contents of the $questionnaire and $user variables (to populate the form)
            return view('admin.questionnaire.edit', ['questionnaire' => $questionnaire, 'user' => $user]);
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Update a questionnaire (in the database)
     * Stores the users updated questionnaire input in the database and redirects the user to the questionnaire index
     * view.
     * @param Request $request - User inputted data (updated questionnaire)
     * @param $id - $question->id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        // Validates the users input
        $this->validate($request, [
            'title' => 'required|max:255',
            'public' => 'required',
            'author_id' => 'required',
        ]);

        // Gets the questionnaire from the database (returns object)
        $questionnaire = Helpers\getQuestionnaireByID($id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // The questionnaire is updated in the database
            $questionnaire->update($request->all());
            // The user is redirected to the page that displays all questionnaires
            return redirect('admin/questionnaires');
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }

    /**
     * Delete a questionnaire
     * Deletes a questionnaire from the database and redirects the user to the questionnaire index. Will also delete any
     * questions, answers and responses associated with this questionnaire.
     * @param $id - $questionnaire->id
     * @return mixed
     */
    public function destroy($id)
    {
        // Gets the questionnaire from the database (returns object)
        $questionnaire = Helpers\getQuestionnaireByID($id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($questionnaire->id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // The questionnaire is deleted from the database
            $questionnaire->delete();
            // The user is redirected to the page that displays all questionnaires
            return redirect('admin/questionnaires');
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }
}