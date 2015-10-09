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
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
