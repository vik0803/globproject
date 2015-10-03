<?php

namespace GlobProject\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
      'name',
      'responsible',
      'email',
      'phone',
      'address',
      'obs'
    ];
}
