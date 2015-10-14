<?php namespace GlobProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectFile
 * @package GlobProject\Entities
 */
class ProjectFile extends Model implements Transformable
{
    /**
     *
     */
    use TransformableTrait;

    /**
     * Campos que podem ser alterados em massa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'extension'
    ];

    /**
     * Ligação entre arquivo e projeto.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
