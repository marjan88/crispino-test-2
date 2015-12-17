<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $table = 'tasks';
    protected $fillable = ['name', 'priority', 'user_id',];

    public function user() {
        return $this->belongsTo('Modules\User\Entities\User', 'user_id');
    }

    public static function storeItem($request) {
        $task = Task::create($request)->user()->associate(\Auth::user())->save();        
        if ($task)
            return $task;
        return false;
    }

    public static function getItem($id) {
        $task = Task::find($id);
        if ($task)
            return $task;
        return false;
    }
    
    

    public static function updateItem($request, $id) {
        $data = [
            'name' => $request->name,
        ];
        $task = Task::find($id);
        if ($task) {
            $task->update($data);
            return true;
        }
        return false;
    }

    

}
