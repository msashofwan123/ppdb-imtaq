<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quiz_id', 'text', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'correct_answer'];

    public function quizzes()
    {
        return $this->belongsTo('App\Models\Quiz');
    }

    public function quiz()
    {
        return $this->hasMany('App\Models\Quiz');
    }
    
}
