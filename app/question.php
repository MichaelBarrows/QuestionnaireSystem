<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'title',
        'type',
        'questionnaire_id',
    ];

    /**
     * Defines the relationship between a question and a questionnaire.
     * A question belongs to one questionnaire.
     */
    public function questionnaire() {
        return $this->belongsTo('App\questionnaire');
    }

    /**
     * Defines the relationship between a question and an answer.
     * A question has zero or many answers.
     */
    public function answer() {
        return $this->hasMany('App\answer');
    }
}