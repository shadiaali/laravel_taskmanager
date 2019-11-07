<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
      'task_type_id',
      'name'
    ];

    public function taskType() {
      return $this->belongsTo(TaskType::class);
    }
}
