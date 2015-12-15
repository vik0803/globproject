<?php namespace GlobProject\Services;


use GlobProject\Entities\ProjectMember;
use GlobProject\Repositories\ProjectRepository;
use GlobProject\Validators\ProjectFileValidator;
use GlobProject\Validators\ProjectValidator;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

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
     * @var ProjectFileValidator
     */
    private $validatorFile;
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var Storage
     */
    private $storage;

    /**
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     * @param ProjectFileValidator $validatorFile
     * @param Filesystem $filesystem
     * @param Storage $storage
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator, ProjectFileValidator $validatorFile, Filesystem $filesystem, Storage $storage) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
        $this->validatorFile = $validatorFile;
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
     * @param array $data
     * @return array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function createFile(array $data)
    {

        try {
            // Verify datas of file
            $this->validatorFile->with($data)->passesOrFail();

            // Get project skip presenter for jobs
            $project = $this->repository->skipPresenter()->find($data['project_id']);

            // Create register of file on bd
            $projectFile = $project->files()->create($data);

            // Save file on filesystem
            $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));

            return $projectFile;

        } catch(ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * @param $projectId
     * @param $fileId
     * @return array
     */
    public function removeFile($projectId, $fileId)
    {

        try {

            // Get project skip presenter for jobs
            $project = $this->repository->skipPresenter()->find($projectId);

            // Create register of file on bd
            $projectFile = $project->files()->findOrFail($fileId);

            // Delete filesystem on files
            $this->storage->delete($projectFile->id.".".$projectFile->extension);

            // Delete file register on bd
            return [
                'success' => true,
                'message' => $projectFile->delete()
            ];

        } catch (ValidationException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => $e->getCode()
            ];
        } catch (FileNotFoundException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }

    }

}