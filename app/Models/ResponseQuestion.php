<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResponseQuestion
 * @package App\Models
 * @version February 5, 2017, 3:13 am UTC
 */
class ResponseQuestion extends Model
{
    use SoftDeletes;

    public $table = 'response_questions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'history_clinic_id',
        'question_id',
        'reponse_value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'history_clinic_id' => 'integer',
        'question_id' => 'integer',
        'reponse_value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'history_clinic_id' => 'required',
        'question_id' => 'required'
    ];

    
}
