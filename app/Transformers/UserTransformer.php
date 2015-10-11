<?php

namespace GlobProject\Transformers;

use League\Fractal\TransformerAbstract;
use GlobProject\Entities\User;

/**
 * Class UserTransformer
 * @package namespace GlobProject\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'userId'  => (int) $model->id,
            'name'    => $model->name,
            'email'   => $model->email,
        ];
    }
}
