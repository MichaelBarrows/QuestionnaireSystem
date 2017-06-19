<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questionnaire extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'public',
        'author_id',
    ];

    /**
     * Defines the relationship between a questionnaire and a user.
     * A questionnaire belongs to one user.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Defines the relationship between a questionnaire and a question.
     * A questionnaire has zero or many questions.
     */
    public function question() {
        return $this->hasMany('App\question');
    }
}