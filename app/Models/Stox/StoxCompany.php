<?php

namespace App\Models\Stox;

use App\Models\Stox\KeyOfficer;
use Faker\Provider\Company;
use Illuminate\Database\Eloquent\Model;

class StoxCompany extends Model
{
    protected $table = 'Stox_TB_Company';

    public function keyOfficers()
    {
        return $this->hasMany(KeyOfficer::class, 'Ticker', 'Ticker');
    }

    public function largeShareHolders()
    {
        return $this->hasMany(LargeShareHolder::class, 'Ticker', 'Ticker');
    }

    public function bankBalanceSheets() {
        return $this->hasMany(BankBalanceSheet::class, 'Ticker', 'Ticker');
    }

    public function fundBalanceSheets() {
        return $this->hasMany(SecuritiesBalanceSheet::class, 'Ticker', 'Ticker');
    }

    public function companyBalanceSheets() {
        return $this->hasMany(CompanyBalanceSheet::class, 'Ticker', 'Ticker');
    }

    public function insuranceBalanceSheets() {
        return $this->hasMany(InsuranceBalanceSheet::class, 'Ticker', 'Ticker');
    }

    public function bankIncomeStatements() {
        return $this->hasMany(BankIncomeStatement::class, 'Ticker', 'Ticker');
    }

    public function fundIncomeStatements() {
        return $this->hasMany(SecuritiesIncomeStatement::class, 'Ticker', 'Ticker');
    }

    public function companyIncomeStatements() {
        return $this->hasMany(CompanyIncomeStatement::class, 'Ticker', 'Ticker');
    }

    public function insuranceIncomeStatements() {
        return $this->hasMany(InsuranceIncomeStatement::class, 'Ticker', 'Ticker');
    }
}
