<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Used to access the custom functions in app/helpers.php
use App\Helpers;

use App\Http\Requests;

class TakeQuestionnaireController extends Controller
{
    /**
     * Finds the first question and sends the user to the first question/error page
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // Get the questionnaire (returns object)
        $questionnaire = Helpers\getQuestionnaireByID($id);
        // Get the first question of the questionnaire (returns int)
        $first_question = Helpers\getFirstQuestion($id);
        // Checks there is a first question to return
        if (isset($first_question)) {
            // Questionnaire is public
            if ($questionnaire->public == true) {
                // Redirects the user to the first question of the questionnaire
                return redirect("question/create/$first_question->id");
                // Questionnaire is not public
            } else {
                // Returns the error view
                return view('public.questionnaire-hidden');
            }
        } else {
            // Returns the questionnaire hidden view as this is generic
            return view('public.questionnaire-hidden');
        }
    }
}