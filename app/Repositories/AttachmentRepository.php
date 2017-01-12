<?php

namespace App\Repositories;

use App\Models\Attachment;
use InfyOm\Generator\Common\BaseRepository;

class AttachmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'filename'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Attachment::class;
    }
}
