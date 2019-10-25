<?php

namespace App\Repositories;

use App\Subcategory;
use App\Repositories\BaseRepository;

/**
 * Class SubcategoryRepository
 * @package App\Repositories
 * @version October 24, 2019, 1:57 am UTC
*/

class SubcategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'category_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Subcategory::class;
    }
}
