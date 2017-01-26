<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;
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
        'derivado_por',
        'motivo_consulta'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'derivado_por' => 'string',
        'motivo_consulta' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'derivado_por' => 'required',
        'motivo_consulta' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person(){
        return $this->belongsTo('App\Models\Person', 'people_id', 'id')->select(["name"]);
    }
    
}
