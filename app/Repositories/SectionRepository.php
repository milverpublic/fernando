<?php

namespace App\Repositories;

use App\Models\Section;
use InfyOm\Generator\Common\BaseRepository;

class SectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_section',
        'section_id',
        'code_section'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Section::class;
    }
}
