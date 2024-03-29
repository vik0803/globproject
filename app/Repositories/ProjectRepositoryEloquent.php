<?php namespace GlobProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GlobProject\Repositories\ProjectRepository;
use GlobProject\Presenters\ProjectPresenter;
use GlobProject\Entities\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace GlobProject\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param $projectId
     * @param $userId
     * @return bool
     */
    public function isOwner($projectId, $userId)
    {
        if (count($this->skipPresenter()->findWhere(['id' => $projectId, 'owner_id' => $userId]))>0) {
            return true;
        }
        return false;
    }

    /**
     * @param $projectId
     * @param $memberId
     * @return bool
     */
    public function hasMember($projectId, $memberId)
    {
        $project = $this->skipPresenter()->find($projectId);

        foreach($project->members as $member) {
            if ($member->id == $memberId) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return ProjectPresenter::class;
    }
}
