<?php

namespace GlobProject\Repositories;

use GlobProject\Presenters\UserPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GlobProject\Repositories\UserRepository;
use GlobProject\Entities\User;

/**
 * Class UserRepositoryRepositoryEloquent
 * @package namespace GlobProject\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
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
