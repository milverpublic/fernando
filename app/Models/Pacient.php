<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pacient
 * @package App\Models
 * @version December 27, 2016, 2:18 pm UTC
 */
class Pacient extends Model
{
    use SoftDeletes;

    public $table = 'pacients';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'derivadoPor',
        'motivoConsulta'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'derivadoPor' => 'string',
        'motivoConsulta' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'derivadoPor' => 'required',
        'motivoConsulta' => 'required'
    ];

    
}
