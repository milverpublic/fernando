<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Control
 * @package App\Models
 * @version March 15, 2017, 2:52 am UTC
 */
class Control extends Model
{
    use SoftDeletes;

    public $table = 'controls';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha_trat',
        'description',
        'next_trat',
        'description_next',
        'status',
        'accepted'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha_trat' => 'date',
        'description' => 'string',
        'next_trat' => 'date',
        'description_next' => 'string',
        'status' => 'string',
        'accepted' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_trat' => 'required',
        'description' => 'required',
        'next_trat' => 'required',
        'description_next' => 'required',
        'status' => 'required',
        'accepted' => 'required'
    ];

    
}
