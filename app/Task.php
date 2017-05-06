<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
 	 protected $table = 'tasks';

	 protected $fillable = ['command', 'minute', 'hour', 'day', 'month', 'day_of_month', 'day_of_week', 'sendOutputTo'];
}
