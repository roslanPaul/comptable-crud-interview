<?php

namespace App\Repositories;

use App\Models\Comptable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ComptableRepository
 * @package App\Repositories
 * @version May 17, 2018, 10:13 am UTC
 *
 * @method Comptable findWithoutFail($id, $columns = ['*'])
 * @method Comptable find($id, $columns = ['*'])
 * @method Comptable first($columns = ['*'])
*/
class ComptableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matricule',
        'password',
        'secret'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comptable::class;
    }
}
