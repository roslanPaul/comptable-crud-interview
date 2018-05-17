<?php

namespace App\Repositories;

use App\Models\Pointage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PointageRepository
 * @package App\Repositories
 * @version May 17, 2018, 8:37 pm UTC
 *
 * @method Pointage findWithoutFail($id, $columns = ['*'])
 * @method Pointage find($id, $columns = ['*'])
 * @method Pointage first($columns = ['*'])
*/
class PointageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matricule',
        'heure',
        'modifier'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pointage::class;
    }
}
