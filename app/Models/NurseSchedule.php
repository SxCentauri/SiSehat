<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NurseSchedule extends Model
{
    protected $fillable = ['nurse_name', 'task', 'schedule_date'];
}
