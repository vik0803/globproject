<?php namespace GlobProject\Transformers;

use GlobProject\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectOwnerTransformer extends TransformerAbstract
{
    /**
     *
     * @param User $owner
     * @return array
     */
    public function transform(User $owner)
    {
        return [
            'memberId'   => $owner->id,
            'name'       => $owner->name,
            'email'      => $owner->email,
        ];
    }

}