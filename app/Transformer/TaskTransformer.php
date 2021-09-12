<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class TaskTransformer extends TransformerAbstract
{

    public function transform($task)
    {
        return [
            'id' => $task->id,
            'user_id' => $task->user_id,
            'task_title' => $task->task_title,
            'category' => $task->category,
            'category_slug' => $task->category_slug,
            'task_details' => $task->task_details,
            'task_deadline' => $task->task_deadline,
            'color' => $task->color,
            'status' => $task->status,
            'created_at' => $task->created_at,
            'updated_at' => $task->updated_at,
        ];
    }
}
