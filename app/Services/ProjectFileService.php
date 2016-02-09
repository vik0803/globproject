<?php namespace GlobProject\Services;


use GlobProject\Repositories\ProjectFileRepository;
use GlobProject\Repositories\ProjectNoteRepository;
use GlobProject\Repositories\ProjectRepository;
use GlobProject\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Validation\ValidationException;
use GlobProject\Validators\ProjectFileValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Filesystem\Factory as Storage;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class ProjectFileService
{
    /**
     *
     * @var ProjectNoteRepository
     */
    protected $repository;

    /**
     * @var
     */
    protected  $projectRepository;

    /**
     * @var ProjectNoteValidator
     */
    private $validator;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var Storage
     */
    private $storage;

    /**
     * @param ProjectNoteRepository $repository
     */
    public function __construct(ProjectFileRepository $repository,
                                ProjectRepository $projectRepository,
                                ProjectFileValidator $validator,
                                Filesystem $filesystem,
                                Storage $storage)
    {
        $this->repository = $repository;
        $this->projectRepository = $projectRepository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();

            $project = $this->projectRepository->skipPresenter(true)->find($data['project_id']);
            $projectFile = $project->files()->create($data);
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

    public function getFilePath($id) {
        $projectFile = $this->repository->skipPresenter()->find($id);
        return $this->getBaseURL($projectFile);
    }

    private function getBaseURL($projectFile)
    {
        switch($this->storage->getDefaultDriver()) {
            case 'local':
                return $this->storage->getDriver()->getAdapter()->getPathPrefix()
                ."/".$projectFile->id.".".$projectFile->extension;
        }
    }


    /**
     * @param $projectId
     * @param $fileId
     * @return array
     */
    public function delete($id)
    {

        try {

            // Get project skip presenter for jobs
            $projectFile = $this->repository->skipPresenter()->find($id);

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


    /**
     * @param $projectId
     * @return array
     */
    public function checkProjectOwner($projectFileId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        $projectId = $this->repository->skipPresenter()->find($projectFileId)->project_id;

        return $this->repository->isOwner($projectId, $userId);
    }

    /**
     * @param $projectId
     * @return mixed
     */
    public function checkProjecMember($projectFileId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        $projectId = $this->repository->skipPresenter()->find($projectFileId)->project_id;

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