<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pointage
 * @package App\Models
 * @version May 17, 2018, 8:37 pm UTC
 *
 * @property string matricule
 * @property string heure
 * @property string modifier
 */
class Pointage extends Model
{

    public $table = 'pointages';
    



    public $fillable = [
        'matricule',
        'heure',
        'modifier'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'matricule' => 'string',
        'heure' => 'string',
        'modifier' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matricule' => 'required',
        'heure' => 'required',
        'modifier' => 'required'
    ];

     public function comptable()
    {
        return $this->belongsTo(Comptable::class);
    }
    
}
