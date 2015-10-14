<?php namespace GlobProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectTasks
 * @package GlobProject\Entities
 */
class ProjectTasks extends Model implements Transformable
{
    /**
     *
     */
    use TransformableTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'project_id',
        'start_date',
        'due_date',
        'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project() {
        return $this->belongsTo(Project::class);
    }
}
