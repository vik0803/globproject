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
            'noteId'    => (int) $model->id,
            'projectId' => (int) $model->project_id,
            'title'     => (int) $model->title,
            'content'   => (int) $model->content,
        ];
    }
}
