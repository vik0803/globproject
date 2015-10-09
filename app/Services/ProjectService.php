<?php namespace GlobProject\Services;


use GlobProject\Repositories\ProjectRepository;
use GlobProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Contracts\Filesystem\Factory as Storage;
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
     * @param Filesystem $filesystem
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Storage $storage) {
        $this->repository = $repository;
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

    public function addMember()
    {

    }

    public function removeMember()
    {

    }

    public function isMember()
    {

    }

    /**
     * @param array $data
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function createFile(array $data)
    {
        $project = $this->repository->skipPresenter()->find($data['projectId']);
        $projectFile = $project->files()->create($data);

        $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));
    }

}