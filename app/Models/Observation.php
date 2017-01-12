<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Observation
 * @package App\Models
 * @version January 11, 2017, 3:38 am UTC
 */
class Observation extends Model
{
    use SoftDeletes;

    public $table = 'observations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'body'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'body' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'required'
    ];

    
}
