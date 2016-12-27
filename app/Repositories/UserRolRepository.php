<?php

namespace App\Repositories;

use App\Models\UserRol;
use InfyOm\Generator\Common\BaseRepository;

class UserRolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'rol_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserRol::class;
    }
}
