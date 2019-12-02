<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
    	'room_id', 'subject_id', 'date', 'start', 'end'
    ];

    protected $hidden = [];

    public function class() {
    	return $this->belongsTo('App\Models\Class');
    }

    public function student() {
    	return $this->belongsToMany('App\Models\Student', 'student_shift', 'shift_id', 'student_id');
    }

    public function room() {
    	return $this->belongsToMany('App\Models\Room', 'shift_room', 'shift_id', 'room_id');
    }
}