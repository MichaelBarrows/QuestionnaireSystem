<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Used to access the custom functions in app/helpers.php
use App\Helpers;
// Used to access the answer model
use App\answer;
// Used to access the response model
use App\response;
use App\Http\Requests;

class AnswerQuestionController extends Controller
{
    /**
     * Displays the questionnaires list on the home page
     * @return mixed
     */
    public function index()
    {
        // Get public questionnaires from the database (returns object)
        $questionnaires = Helpers\getPublicQuestionnaires();
        // Returns the index view for the public questionnaires view with the contents of the $questionnaires variable (to populate the page)
        return view('public.questionnaire.index', ['questionnaires' => $questionnaires]);
    }

    /**
     * Displays the question to the user
     * @param $id
     * @return mixed
     */
    public function create($id)
    {
        // Get the question from the database
        $question = Helpers\getQuestionByID($id);
        // Get the respondent's individual repondent_id
        $respondent_id = Helpers\getRespondentID($question);
        // Returns the show view for the question with the contents of the $question and $respondent_id variables (to populate the page)
        return view('public.question.show', ['question' => $question, 'respondent_id' => $respondent_id]);
    }

    /**
     * Stores the users response and redirects to the next question
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        // If the title attribute is set, a text answer has been submitted
        if(isset($request->title)){
            // Validate the users input
            $this->validate($request, [
                'title' => 'required|max:50',
            ]);
            // Add the users text input to the answers table & associate with the question
            answer::create(['title' => $request->title, 'rating' => $request->rating, 'question_id' => $request->question_id]);
            // Get the answer that was just submitted back from the database
            $answer = answer::where('title', $request->title)->where('question_id', $request->question_id)->first();
            // Add the response to the response table
            response::create(['respondent_id' => $request->respondent_id, 'answer_id' => $answer->id]);
            // Get the next question ID
            $next_question = Helpers\getNextQuestion($answer->id);

        // If the title attribute is not set, a multiple choice question has been submitted
        } else {
            // Validate the users input
            $this->validate($request, [
                'answer_id' => 'required',
            ]);
            // Add the response to the response table
            response::create($request->all());
            // Get the next question ID
            $next_question = Helpers\getNextQuestion($request->answer_id);
        }
        // Check if the $next_question number is set
        if (isset($next_question)) {
            // Send the user back to the page to complete the next question
            return redirect("question/create/$next_question->id");
        // $next_question not set (user has completed the questionnaire)
        } else {
            // Send the user to the thank you page
            return redirect("thank-you/$request->respondent_id");
        }
    }

    /**
     * Deletes all of the users responses
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        // Delete all of the respondents answers so far
        response::where('respondent_id', $id)->delete();
        // Redirect the participant to a page confirming their answers have been deleted
        return redirect('responses-deleted');
    }
}