<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_answers';

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
    protected $fillable = ['user_id', 'question_id', 'answer'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // public function question()
    // {
    //     return $this->belongsTo('App\Models\Questions');
    // }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
}
