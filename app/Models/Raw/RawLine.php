<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawLine extends Model
{
    protected $connection = 'mongo';
    protected $table = 'lines';
}
