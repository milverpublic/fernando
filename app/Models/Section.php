<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Section
 * @package App\Models
 * @version January 31, 2017, 3:33 am UTC
 */
class Section extends Model
{
    use SoftDeletes;

    public $table = 'sections';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name_section',
        'section_id',
        'code_section'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_section' => 'string',
        'section_id' => 'integer',
        'code_section' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_section' => 'required',
        'code_section' => 'required'
    ];

    
}
