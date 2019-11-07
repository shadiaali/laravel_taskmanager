<?php

use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    private $taskTypes = [
      ['name' => 'Chore', 'color'=>'red'],
      ['name' => 'Event', 'color'=>'blue']
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->taskTypes as $type) {
          \App\TaskType::firstOrCreate([
            'name' => $type['name'],
            'color' => $type['color']
          ]);
        }
    }
}
