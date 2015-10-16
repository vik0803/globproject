<?php

namespace GlobProject\Repositories;

use GlobProject\Presenters\ProjectNotePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GlobProject\Entities\ProjectNote;

/**
 * Class ProjectNoteRepositoryEloquent
 * @package namespace GlobProject\Repositories;
 */
class ProjectNoteRepositoryEloquent extends BaseRepository implements ProjectNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectNote::class;
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
        return ProjectNotePresenter::class;
    }
}
