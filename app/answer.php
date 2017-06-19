<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'rating',
        'question_id',
    ];

    /**
     * Defines the relationship between an answer and a question.
     * An answer belongs to one question.
     */
    public function question() {
        return $this->belongsTo('App\question');
    }

    /**
     * Defined the relationship between an answer and a response.
     * An answer has zero or many responses.
     */
    public function response() {
        return $this->hasMany('App\response');
    }
}