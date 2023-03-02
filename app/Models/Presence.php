<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'schedule_id',
        'student_id',
        'group_id',
        'presence',
        'note',
    ];
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
