<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers;

use App\Http\Requests;
use Auth;

class ResultsController extends Controller
{
    /**
     * ResultsController constructor.
     *
     * Ensures the user is logged in to access the admin pages.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns the view that displays the results of a questionnaire with its questions and answers to the user.
     * @param $id - $questionnaire->id
     * @return mixed
     */
    public function show($id)
    {
        // Get the questionnaire from the database (returns object)
        $questionnaire = Helpers\getQuestionnaireByID($id);
        // Checks if the user is the author of the questionnaire (returns boolean)
        $ownerCheck = Helpers\checkAuth($id);
        // User is the author of the questionnaire
        if ($ownerCheck == true) {
            // Returns the show view for the result with the contents of the $questionnaire variable (to populate the questionnaire)
            return view('admin.results.show', ['questionnaire' => $questionnaire]);
        // User is not the author of the questionnaire
        } else {
            // Returns the error page
            return view('admin.unauthorised-error');
        }
    }
}