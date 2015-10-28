<?php namespace GlobProject\Transformers;

use GlobProject\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'files',
        'members',
        'owner',
        'client'
    ];

    /**
     * @param Project $project
     * @return array
     */
    public function transform(Project $project)
    {
        return [
            'projectId'   => $project->id,
            'clienteId'   => $project->client_id,
            'ownerId'     => $project->owner_id,
            'name'        => $project->name,
            'description' => $project->description,
            'progress'    => $project->progress,
            'status'      => $project->status,
            'dueDate'     => $project->due_date,
        ];
    }

    /**
     * @param Project $project
     * @return \League\Fractal\Resource\Collection
     */
    public function includeFiles(Project $project)
    {
        return $this->collection($project->files, new ProjectFileTransformer());
    }

    /**
     * @param Project $project
     * @return \League\Fractal\Resource\Collection
     */
    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

    /**
     * @param Project $project
     * @return \League\Fractal\Resource\Item
     */
    public function includeOwner(Project $project)
    {
        return $this->item($project->owner, new ProjectOwnerTransformer());
    }

    /**
     * @param Project $project
     * @return \League\Fractal\Resource\Item
     */
    public function includeClient(Project $project)
    {
        return $this->item($project->client, new ProjectClientTransformer());
    }
}