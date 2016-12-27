<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserRol
 * @package App\Models
 * @version December 27, 2016, 1:46 pm UTC
 */
class UserRol extends Model
{
    use SoftDeletes;

    public $table = 'user_rols';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'rol_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'rol_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'rol_id' => 'required'
    ];

    
}
