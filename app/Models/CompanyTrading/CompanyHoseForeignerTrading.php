<?php

namespace App\Models\CompanyTrading;

use Jenssegers\Mongodb\Eloquent\Model;

class CompanyHoseForeignerTrading extends Model
{
    protected $guarded = ['_id'];
    protected $connection = 'mongodb2';
    protected $table = 'stox_tb_HOSE_ForeignerTrading';
}
