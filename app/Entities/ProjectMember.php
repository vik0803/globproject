<?php

namespace GlobProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
/**
 * Class ProjectMember
 * @package GlobProject\Entities
 */
class ProjectMember extends Model implements Transformable
{
    /**
     *
     */
    use TransformableTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'member_id',
        'project_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
