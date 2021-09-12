<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{

    public function transform($task)
    {
        return [
            'id' => $task->id,
            'category_title' => $task->category_title,
            'category_slug' => $task->category_slug,
            'status' => $task->status,
            'created_at' => $task->created_at,
            'updated_at' => $task->updated_at,
        ];
    }
}
