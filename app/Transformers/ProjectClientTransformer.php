<?php namespace GlobProject\Transformers;


use GlobProject\Entities\Client;
use League\Fractal\TransformerAbstract;

class ProjectClientTransformer extends TransformerAbstract
{

    public function transform(Client $model)
    {
        return [
            'clientId'   => (int) $model->id,
            'name'       => $model->name,
            'responsible'=> $model->responsible,
            'email'      => $model->email,
            'phone'      => $model->phone,
            'address'    => $model->address,
            'obs'        => $model->obs,
        ];
    }

}