<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function list($filters)
    {
        $query = Task::query();

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['sort'])) {
            $query->orderBy('due_date', $filters['sort']);
        }

        return $query->paginate(10);
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data)
    {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task)
    {
        return $task->delete();
    }
}
