<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class response extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'respondent_id',
        'answer_id',
    ];

    /**
     * Defines the relationship between a response and an answer.
     * A response belongs to one answer.
     */
    public function answer() {
        return $this->belongsTo('App\answer');
    }
}