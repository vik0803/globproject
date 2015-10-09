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
        'members',
        'owner',
        'client'
    ];

    public function transform(Project $project)
    {
        return [
            'projectId'   => $project->id,
            'clienteId'   => $project->client_id,
            'ownerId'     => $project->owner_id,
            'project'     => $project->name,
            'description' => $project->description,
            'progress'    => $project->progress,
            'status'      => $project->status,
            'dueDate'     => $project->due_date,
        ];
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

    public function includeOwner(Project $project)
    {
        return $this->item($project->owner, new ProjectOwnerTransformer());
    }

    public function includeClient(Project $project)
    {
        return $this->item($project->client, new ProjectClientTransformer());
    }
}