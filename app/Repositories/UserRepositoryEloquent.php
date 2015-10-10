<?php

namespace GlobProject\Repositories;

use GlobProject\Presenters\UserPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GlobProject\Repositories\UserRepositoryRepository;
use GlobProject\Entities\UserRepository;

/**
 * Class UserRepositoryRepositoryEloquent
 * @package namespace GlobProject\Repositories;
 */
class UserRepositoryRepositoryEloquent extends BaseRepository implements UserRepositoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserRepository::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return UserPresenter::class;
    }
}
