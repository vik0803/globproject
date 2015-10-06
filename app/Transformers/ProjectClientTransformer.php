<?php namespace GlobProject\Transformers;


use GlobProject\Entities\Client;
use League\Fractal\TransformerAbstract;

class ProjectClientTransformer extends TransformerAbstract
{

    public function transform(Client $client)
    {
        return [
            'clientId'   => $client->id,
            'name'       => $client->name,
            'email'      => $client->email,
        ];
    }

}