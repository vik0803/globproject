<?php

namespace GlobProject\Transformers;

use League\Fractal\TransformerAbstract;
use GlobProject\Entities\ProjectFile;

/**
 * Class ProjectFileTransformer
 * @package namespace GlobProject\Transformers;
 */
class ProjectFileTransformer extends TransformerAbstract
{
    /**
     * Transform the \ProjectFile entity
     * @param \ProjectFile $model
     *
     * @return array
     */
    public function transform(ProjectFile $model)
    {
        return [
            'id'            => (int)$model->id,
            'name'          => $model->name,
            'description'   => $model->description,
            'extension'     => $model->extension,
        ];
    }
}
