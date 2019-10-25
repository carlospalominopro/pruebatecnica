<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Subcategory
 * @package App\Models
 * @version October 24, 2019, 1:57 am UTC
 *
 * @property string name
 * @property integer category_id
 */
class Subcategory extends Model
{

    public $table = 'subcategories';



    public $fillable = [
        'name',
        'category_id',
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
        'category_id' => 'integer',
        'status'=> 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'category_id' => 'required',
        'status'=> 'required',
    ];

    
}
