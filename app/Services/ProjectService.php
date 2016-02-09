<?php namespace GlobProject\Services;


use GlobProject\Entities\ProjectMember;
use GlobProject\Repositories\ProjectRepository;
use GlobProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Filesystem\Filesystem;

class ProjectService
{
    /**
     *
     * @var ProjectRepository
     */
    protected $repository;
    /**
     * @var ProjectValidator
     */
    private $validator;

    /**
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();

            return $this->repository->create($data);

        } catch(ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function update(array $data, $id)
    {
        try {

            $this->validator->with($data)->passesOrFail();

            return $this->repository->update($data, $id);

        } catch(ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * @param $projectId
     * @param $userID
     * @return mixed
     */
    public function addMember($projectId, $userID)
    {
        if (!$this->isMember($projectId, $userID)) {
            $member = ProjectMember::create([
                'project_id' => $projectId,
                'member_id' => $userID,
            ]);
            return $member;
        }
        return false;
    }

    /**
     * @param $projectId
     * @param $userID
     * @return mixed
     */
    public function removeMember($projectId, $userID)
    {
        if (!$this->isMember($projectId, $userID)) {
            $member = ProjectMember::where('project_id', $projectId)->where('member_id', $userID);
            return $member->delete();
        }
        return false;
    }

    /**
     * Verify that the user is member.
     *
     * @param $projectId
     * @param $memberId
     * @return bool
     */
    public function isMember($projectId, $memberId)
    {
        $project = $this->repository->find($projectId);

        foreach($project->members as $member) {
            if ($member->id == $memberId) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $projectId
     * @return array
     */
    public function checkProjectOwner($projectId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($projectId, $userId);
    }

    /**
     * @param $projectId
     * @return mixed
     */
    public function checkProjecMember($projectId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($projectId, $userId);
    }

    /**
     * @param $projectId
     * @return bool
     */
    public function checkProjectPermissions($projectId)
    {
        $validateUser = $this->checkProjectOwner($projectId);
        $validateProject =$this->checkProjecMember($projectId);

        if ($validateUser OR $validateProject) {
            return true;
        }
        return false;
    }

}