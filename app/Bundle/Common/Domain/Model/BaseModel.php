<?php

namespace App\Bundle\Common\Domain\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 *
 * @package Core\Entities\Models
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel query()
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    protected $connection = 'mysql';
}
