<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HistoryClinic
 * @package App\Models
 * @version January 31, 2017, 3:25 am UTC
 */
class HistoryClinic extends Model
{
    use SoftDeletes;

    public $table = 'history_clinics';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'pacient_id',
        'actualizado_por'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pacient_id' => 'integer',
        'actualizado_por' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pacient_id' => 'required'
    ];

    public function pacient(){
        return $this->belongsTo('App\Models\Pecient', 'pacient_id', 'id');
    }
}
