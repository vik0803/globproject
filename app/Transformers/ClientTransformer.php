<?php

namespace GlobProject\Transformers;

use League\Fractal\TransformerAbstract;
use GlobProject\Entities\Client;

/**
 * Class ClientTransformer
 * @package namespace GlobProject\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'projects',
    ];

    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
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

    /**
     * @param Client $client
     * @return \League\Fractal\Resource\Collection
     */
    public function includeProjects(Client $client)
    {
        return $this->collection($client->projects, new ProjectTransformer());
    }
}
