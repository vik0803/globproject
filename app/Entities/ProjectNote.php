<?php

namespace GlobProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectNote
 * @package GlobProject\Entities
 */
class ProjectNote extends Model implements Transformable
{
    /**
     *
     */
    use TransformableTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'project_id',
        'title',
        'content',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project() {
        return $this->belongsTo(Project::class);
    }
}
