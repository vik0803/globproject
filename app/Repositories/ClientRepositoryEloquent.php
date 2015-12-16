<?php namespace GlobProject\Repositories;

use GlobProject\Entities\Client;
use GlobProject\Presenters\ClientPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ClientRepositoryEloquent
 * @package GlobProject\Repositories
 */
class ClientRepositoryEloquent extends  BaseRepository implements ClientRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

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

    public function boot()
    {
        $this->pushCriteria(app(
            'Prettus\Repository\Criteria\RequestCriteria'
        ));
    }
}