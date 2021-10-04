<?php

namespace App\Models\CompanyTrading;

use Jenssegers\Mongodb\Eloquent\Model;

class CompanyStocksInfo extends Model
{
    protected $connection = 'mongodb2';
    protected $table = 'stox_tb_StocksInfo';
}
