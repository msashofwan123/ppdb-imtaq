<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

        /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function member()
    {
        return $this->hasMany(Member::class);
    }

}
