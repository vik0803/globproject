<?php

namespace GlobProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GlobProject\Repositories\ProjectTasksRepository;
use GlobProject\Entities\ProjectTasks;

/**
 * Class ProjectTasksRepositoryEloquent
 * @package namespace GlobProject\Repositories;
 */
class ProjectTasksRepositoryEloquent extends BaseRepository implements ProjectTasksRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectTasks::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
