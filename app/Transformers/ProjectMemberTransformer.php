<?php namespace GlobProject\Transformers;

use GlobProject\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{

    public function transform(User $member)
    {
        return [
            'memberId'   => $member->id,
            'name'       => $member->name,
            'email'      => $member->email,
        ];
    }

}