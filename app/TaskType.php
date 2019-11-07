<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
  protected $fillable = [
    'name',
    'color'
  ];

  public function tasks() {
    return $this->hasMany(Task::class);
  }
}
