<?php

namespace App\Models\StoxMongo;

use Jenssegers\Mongodb\Eloquent\Model;

class Industry extends Model
{
    protected $connection = 'mongodb2';
    protected $table = 'Stox_TB_Industry';
}
