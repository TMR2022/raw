<?php

namespace App\Models\CompanyTrading;

use Jenssegers\Mongodb\Eloquent\Model;

class CompanyOutstandingShare extends Model
{
    protected $connection = 'mongodb2';
    protected $table = 'Stox_tb_OutstandingShare';
}
