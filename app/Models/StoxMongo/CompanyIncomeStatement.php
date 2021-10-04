<?php

namespace App\Models\StoxMongo;

use Jenssegers\Mongodb\Eloquent\Model;

class CompanyIncomeStatement extends Model
{
    protected $connection = 'mongodb2';
    protected $table = 'Stox_TB_Fund_CompanyIncomeStatement';
}
