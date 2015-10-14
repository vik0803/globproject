<?php namespace GlobProject\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * @package GlobProject\Entities
 */
class Client extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
      'name',
      'responsible',
      'email',
      'phone',
      'address',
      'obs'
    ];

    /**
     * Projects of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects() {
        return $this->hasMany(Project::class,  'owner_id', 'id');
    }
}
