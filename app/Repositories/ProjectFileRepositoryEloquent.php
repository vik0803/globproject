<?php

namespace GlobProject\Repositories;

use GlobProject\Presenters\ProjectTasksPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GlobProject\Repositories\ProjectTasksRepository;
use GlobProject\Entities\ProjectTasks;

/**
 * Class ProjectTasksRepositoryEloquent
 * @package namespace GlobProject\Repositories;
 */
class ProjectFileRepositoryEloquent extends BaseRepository implements ProjectFileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectFile::class;
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
        return ProjectFilePresenter::class;
    }
}
