<?php

namespace Modules\Task\Repositories;

use Modules\Task\Entities\Task;

class TaskRepository {

    public function storeTask($request) {

        $data = [
            'name' => $request->name,
        ];
        return Task::storeItem($data);
    }

    public function getTask($id) {
        return $task = Task::getItem($id);
    }

    public function updateTask($request, $id) {
        return $task = Task::updateItem($request, $id);
    }

    public function deleteTask($id) {
        $task = $this->getTask($id);

        if (!\Auth::user()->isUserTask($task))
            return false;
        $task->delete();
        return true;
    }

    public function orderTasks($request) {
        foreach ($request as $value => $id) {

            $orders = explode(',', $value);
            $orders = array_combine(range(1, count($orders)), $orders);
            foreach ($orders as $value => $id) {
                $task = $this->getTask($id);
                if ($task) {
                    $task->update(['priority' => $value]);
                }
            }
        }
        return true;
    }

}
