<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:17 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Get name table by static model
     *
     * @return string
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
