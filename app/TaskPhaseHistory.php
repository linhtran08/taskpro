<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskPhaseHistory extends Model
{
    protected $table = 'task_phase_history';
    protected $primaryKey = 'task_phase_history_id';
    public $timestamps = false;


}
