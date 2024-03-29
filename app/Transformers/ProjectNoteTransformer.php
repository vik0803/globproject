<?php

namespace GlobProject\Transformers;

use League\Fractal\TransformerAbstract;
use GlobProject\Entities\ProjectNote;

/**
 * Class ProjectNoteTransformer
 * @package namespace GlobProject\Transformers;
 */
class ProjectNoteTransformer extends TransformerAbstract
{
    /**
     * Transform the \ProjectNote entity
     * @param \ProjectNote $model
     *
     * @return array
     */
    public function transform(ProjectNote $model)
    {
        return [
            'id'            => (int) $model->id,
            'project_id'    => (int) $model->project_id,
            'title'         => $model->title,
            'content'       => $model->content,
        ];
    }
}
