<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Person
 * @package App\Models
 * @version December 27, 2016, 1:56 pm UTC
 */
class Person extends Model
{
    use SoftDeletes;

    public $table = 'people';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'last_name',
        'address',
        'age',
        'gender'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'last_name' => 'string',
        'address' => 'string',
        'age' => 'integer',
        'gender' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'gender' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pacient(){
        return $this->hasOne('App\Models\Pacient', 'people_id', 'id');
    }
    
}
