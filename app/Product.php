<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Product
 * @package App\Models
 * @version October 24, 2019, 1:56 am UTC
 *
 * @property string name
 * @property integer subcategory_id
 * @property integer status
 */
class Product extends Model
{

    public $table = 'products';
    



    public $fillable = [
        'name',
        'subcategory_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'subcategory_id' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'subcategory_id' => 'required',
        'status' => 'required'
    ];

    
}
