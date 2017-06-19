<?php

namespace App\Helpers;
use Auth;
use App\questionnaire;
use App\question;
use App\answer;
use App\response;

/**
 * Checks if the user is the author of the requested questionnaire by comparing the user->id of the current user
 * against the questionnaire->author_id and returns a boolean response.
 * @param $user
 * @param $questionnaire
 * @return bool
 */
function checkAuth($questionnaire) {
    $user = Auth::user();
    $questionnaire = getQuestionnaireByID($questionnaire);
    if ($user->id === $questionnaire->author_id) {
        return true;
    } else {
        return false;
    }
}

/**
 * Gets the currently logged in users details from the database and returns them to the controller
 * @return mixed
 */
function getUser() {
    return Auth::user();
}

/**
 * Gets a questionnaire from the database by it's ID (parameter)
 * @param $id
 * @return mixed
 */
function getQuestionnaireByID($id) {
    return questionnaire::findOrFail($id);
}

/**
 * Gets multiple questionnaires from the database that belong to the currently logged in user
 * @return mixed
 */
function getQuestionnairesByUserID() {
    $user = Auth::user();
    return questionnaire::where('author_id', $user->id)->get();
}

/**
 * Gets a question from the database by searching for it's ID (parameter)
 * @param $id
 * @return mixed
 */
function getQuestionByID($id) {
    return question::findOrFail($id);
}

/**
 * Gets a questionnaire fromt he database by searching the question table for the question ID (parameter), and uses the
 * questionnaire_id attribute of the question table to get the questionnaire.
 * @param $id
 * @return mixed
 */
function getQuestionnireByQuestionID ($id) {
    $question = question::findOrFail($id);
    return questionnaire::findOrFail($question->questionnaire->id);
}

/**
 * Gets the details of a questionnaire using an answer ID (parameter) by finding the answer and it's details, then finds
 * the question using the question_id attribute of the answer and then finds the questionnaire using the questionnaire_id
 * attribute of the question.
 * @param $id
 * @return mixed
 */
function getQuestionnaireByAnswerID ($id) {
    $answer = answer::findOrFail($id);
    return questionnaire::findOrFail($answer->question->questionnaire->id);
}

/**
 * Works out the number of the question by finding the highest question number of the questionnaire and adding 1 to it.
 * @param $questionnaire_id
 * @return mixed
 */
function getNextQuestionNumber($id) {
    $prev_question_number = question::where('questionnaire_id', $id)->orderBy('number', 'desc')->first();
    if (isset($prev_question_number)) {

        return $prev_question_number->number + 1;
    } else {
        return 1;
    }
}

/**
 * Gets an answer from the database by searching for it's ID (parameter)
 * @param $id
 * @return mixed
 */
function getAnswerByID ($id) {
    return answer::findOrFail($id);
}

/**
 * Gets answers from the database by searching the question_id attribute in the answers table.
 * @param $id
 * @return mixed
 */
function getAnswersByQuestionID($id) {
    return answer::where('question_id', $id)->get();
}

/**
 * Gets public questionnaires from the database
 * @return mixed
 */
function getPublicQuestionnaires() {
    return questionnaire::where('public', true)->get();
}

/**
 * Assigns an id to the respondent
 * @param $question
 * @return mixed
 */
function getRespondentID ($question) {
    // Get all questions for this questionnaire and sort them into ascending order by the id attribute
    $questions = question::where('questionnaire_id', $question->questionnaire_id)->orderBy('id', 'asc')->first();
    // Where clause is part of this as would not allow orderBY function without it
    // Get respondent_id of the last respondent
    $response = response::where('id', '!=', 'null')->orderBy('id', 'desc')->first();
    // Check the $respondent_id has a value
    if (isset($response)){
        // set the respondent_id to the last response ID
        $respondent_id = $response->respondent_id;
        // Checks if the current question is the first of the questionnaire
        if ($question->id == $questions->id) {
            // because it's the first question of the questionnaire, the $respondent_id is incremented as it's not the
            // same person
            $respondent_id++;
        }
        // return the $respondent_id to the controller
        return $respondent_id;
    } else {
        // $respondent_id is not set, return null
        return null;
    }
}

// gets the next question of a questionnaire
function getNextQuestion ($id) {
    // Find the answer in the database
    $answer = getAnswerByID($id);
    return question::where('questionnaire_id', $answer->question->questionnaire->id)->where('id', '>', $answer->question->id)->orderBy('id', 'asc')->first();
}

// gets a questionnaire from a respondent
function getQuestionnaireByRespondent ($id) {
    $response = response::where('respondent_id', $id)->first();
    return getQuestionnaireByAnswerID($response->answer_id);
}

// gets the first question of a questionnaire
function getFirstQuestion ($id) {
    $questionnaire = getQuestionnaireByID($id);
    return question::where('questionnaire_id', $questionnaire->id)->orderBy('id', 'asc')->first();
}