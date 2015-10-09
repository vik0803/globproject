<?php

namespace GlobProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectTasks extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'project_id',
        'start_date',
        'due_date',
        'status',
    ];

}
