<?php namespace GlobProject\Repositories;

use GlobProject\Entities\Client;
use GlobProject\Presenters\ClientPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends  BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return ClientPresenter::class;
    }
}