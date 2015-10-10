<?php namespace GlobProject\Services;


use GlobProject\Repositories\ProjectRepository;
use GlobProject\Validators\ProjectTasksValidator;
use Illuminate\Contracts\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectTasksService
{
    /**
     *
     * @var ProjectRepository
     */
    protected $repository;
    /**
     * @var ProjectTasksValidator
     */
    private $validator;

    /**
     * @param ProjectRepository $repository
     */
    public function __construct(ProjectRepository $repository, ProjectTasksValidator $validator) {
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

}