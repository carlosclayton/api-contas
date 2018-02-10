<?php

namespace ApiContas\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Bills extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = ['name','value', 'done'];
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'done' => '=',
        'value' => 'like'
    ];
}
