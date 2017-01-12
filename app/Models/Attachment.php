<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Attachment
 * @package App\Models
 * @version January 11, 2017, 3:40 am UTC
 */
class Attachment extends Model
{
    use SoftDeletes;

    public $table = 'attachments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'filename'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'filename' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
