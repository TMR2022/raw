<?php

namespace App\Console\Commands\Legacy;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class compare_stox_db extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compare_stox_db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tables = array('stox_tb_fund_CompanyBalanceSheet', 'stox_tb_fund_CompanyCashFlowStatement', 'stox_tb_refe_KeyOfficers', 'stox_tb_fund_CompanyIncomeStatement', 'stox_tb_fund_InsuranceBalanceSheet', 'stox_tb_fund_InsuranceCashFlowStatement', 'stox_tb_fund_InsuranceCashFlowStatement_GT', 'stox_tb_Industry', 'stox_tb_fund_InsuranceIncomeStatement', 'Stox_tb_fund_InsuranceKeyStatitic', 'stox_tb_Company', 'stox_tb_MarketInfo', 'stox_tb_fund_KeyStatistics', 'stox_tb_fund_Ownership_New', 'stox_tb_PriceAdjusted', 'Stox_tb_Fund_SecuritiesBalanceSheet', 'stox_tb_corp_CashDividend', 'stox_tb_fund_SecuritiesCashFlowStatement', 'stox_tb_corp_DirectorDeals', 'Stox_tb_OutstandingShare', 'stox_tb_fund_SecuritiesCashFlowStatement_GT', 'stox_tb_IPO', 'stox_tb_corp_ShareIssue_All', 'stox_tb_corp_TreasuryStocks', 'stox_tb_corp_ConvertibleDebts', '_dual', 'stox_tb_fund_SecuritiesIncomeStatement', 'stox_tb_LargeShareholders', 'Stox_tb_fund_SecuritiesKeyStatitic', 'stox_tb_HOSE_ForeignerTrading', 'stox_tb_HOSE_TotalTrading', 'stox_tb_Events', 'stox_tb_fund_BankBalanceSheet', '_temp', 'stox_tb_StocksInfo', 'stox_tb_fund_BankCashFlowStatement', 'stox_tb_HOSE_Trading_BAK2', 'stox_tb_fund_BankIncomeStatement', 'stox_tb_Upcom_MarketInfo', 'stox_tb_fund_BankKeyStatistics', 'stox_tb_upcom_StocksInfo', 'stox_tb_HOSE_Trading', 'stox_tb_VNDirectMarketData');


		foreach ($tables as $table) {
			$countMongo = DB::connection('mongodb2')->table($table)->count();
			$countSql = DB::table($table)->count();
			echo $table. ': Mongo: '.$countMongo. '; SQL: '.$countSql. ' - ';
			if ($countMongo != $countSql) {
				echo (int) ($countMongo / $countSql * 100)."% \n";
			} else {
				echo "CHUẨN \n";
			}
		}

		exit();
    }
}
