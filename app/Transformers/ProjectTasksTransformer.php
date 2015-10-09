<?php

namespace GlobProject\Transformers;

use League\Fractal\TransformerAbstract;
use GlobProject\Entities\ProjectTasks;

/**
 * Class ProjectTasksTransformer
 * @package namespace GlobProject\Transformers;
 */
class ProjectTasksTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProjectTasks entity
     * @param \ProjectTasks $model
     *
     * @return array
     */
    public function transform(ProjectTasks $model)
    {
        return [
            'taskID'    => (int) $model->id,
            'projectID' => (int) $model->project_id,
            'startDate' => $model->start_date,
            'dueDate'   => $model->due_date,
            'status'    => $model->status,

        ];
    }
}
