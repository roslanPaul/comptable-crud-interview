<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comptable
 * @package App\Models
 * @version May 17, 2018, 10:13 am UTC
 *
 * @property string matricule
 * @property string password
 * @property string secret
 */
class Comptable extends Model
{
    use SoftDeletes;

    public $table = 'comptables';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'matricule',
        'password',
        'secret'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'matricule' => 'string',
        'password' => 'string',
        'secret' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matricule' => 'required',
        'password' => 'required',
        'secret' => 'required'
    ];

    public function pointages()
    {
        return $this->hasMany(Pointages::class);
    }
}
