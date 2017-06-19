<?php

namespace App\Http\Controllers;

// Used to access the custom functions in app/helpers.php
use App\Helpers;
use Illuminate\Http\Request;

use App\Http\Requests;

class ThankYouController extends Controller
{
    /**
     * Displays the thank you page
     * @param $respondent_id
     * @return mixed
     */
    public function index($respondent_id)
    {
        // Gets the questionnaire using the $respondent_id
        $questionnaire = Helpers\getQuestionnaireByRespondent($respondent_id);
        // Returns the thank you page view with the respondent ID and questionnaire data
        return view('public.thankyou', ['respondent_id' => $respondent_id, 'questionnaire' => $questionnaire]);
    }

    /**
     * Shows the responses deleted page
     * @return mixed
     */
    public function show()
    {
        // Returns the results deleted page
        return view('public.deleted-responses');
    }
}