<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ControlSheet
 * @package App\Models
 * @version January 11, 2017, 3:34 am UTC
 */
class ControlSheet extends Model
{
    use SoftDeletes;

    public $table = 'control_sheets';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha_tratamiento',
        'tratamiento',
        'tratamiento_next',
        'pacient_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha_tratamiento' => 'date',
        'tratamiento' => 'string',
        'tratamiento_next' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_tratamiento' => 'required|date',
        'tratamiento' => 'required',
        'tratamiento_next' => 'required'
    ];

    
}
