<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CopyStox extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copy_stox';

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

    public function from_camel_case($input) {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*
                $a =  DB::table('StoxPlusData.INFORMATION_SCHEMA.TABLES')->where('TABLE_TYPE', 'BASE TABLE')->get();
                foreach ($a as $item) {
                    echo "'".$item->TABLE_NAME."', ";
                }
                exit();
        */
        $per_page = 1000;
        $tables = array('stox_tb_fund_CompanyBalanceSheet', 'stox_tb_fund_CompanyCashFlowStatement', 'stox_tb_refe_KeyOfficers', 'stox_tb_fund_CompanyIncomeStatement', 'stox_tb_fund_InsuranceBalanceSheet', 'stox_tb_fund_InsuranceCashFlowStatement', 'stox_tb_fund_InsuranceCashFlowStatement_GT', 'stox_tb_Industry', 'stox_tb_fund_InsuranceIncomeStatement', 'Stox_tb_fund_InsuranceKeyStatitic', 'stox_tb_Company', 'stox_tb_MarketInfo', 'stox_tb_fund_KeyStatistics', 'stox_tb_fund_Ownership_New', 'stox_tb_PriceAdjusted', 'Stox_tb_Fund_SecuritiesBalanceSheet', 'stox_tb_corp_CashDividend', 'stox_tb_fund_SecuritiesCashFlowStatement', 'stox_tb_corp_DirectorDeals', 'Stox_tb_OutstandingShare', 'stox_tb_fund_SecuritiesCashFlowStatement_GT', 'stox_tb_IPO', 'stox_tb_corp_ShareIssue_All', 'stox_tb_corp_TreasuryStocks', 'stox_tb_corp_ConvertibleDebts', '_dual', 'stox_tb_fund_SecuritiesIncomeStatement', 'stox_tb_LargeShareholders', 'Stox_tb_fund_SecuritiesKeyStatitic', 'stox_tb_HOSE_ForeignerTrading', 'stox_tb_HOSE_TotalTrading', 'stox_tb_Events', 'stox_tb_fund_BankBalanceSheet', '_temp', 'stox_tb_StocksInfo', 'stox_tb_fund_BankCashFlowStatement', 'stox_tb_fund_BankIncomeStatement', 'stox_tb_Upcom_MarketInfo', 'stox_tb_fund_BankKeyStatistics', 'stox_tb_upcom_StocksInfo', 'stox_tb_HOSE_Trading', 'stox_tb_VNDirectMarketData');

        /*

        $lastIdInMyDB = DB::connection('mongodb2')->table('stox_tb_fund_CompanyBalanceSheet')->orderBy('ID', 'DESC')->first();
        if ($lastIdInMyDB) {
            $lastId = $lastIdInMyDB['ID'];
        }
        echo $lastId;
        exit();


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

        */

        //$tables = array('stox_tb_industry','stox_tb_company', 'stox_tb_corp_cashdividend', 'stox_tb_corp_convertibledebts', 'stox_tb_corp_directordeals', 'stox_tb_corp_shareissue_all', 'stox_tb_corp_treasurystocks', 'stox_tb_events', 'stox_tb_fund_bankbalancesheet', 'stox_tb_fund_bankcashflowstatement', 'stox_tb_fund_bankincomestatement', 'stox_tb_fund_bankkeystatistics', 'stox_tb_fund_companybalancesheet', 'stox_tb_fund_companycashflowstatement', 'stox_tb_fund_companyincomestatement', 'stox_tb_fund_insurancebalancesheet', 'stox_tb_fund_insurancecashflowstatement', 'stox_tb_fund_insurancecashflowstatement_gt', 'stox_tb_fund_insuranceincomestatement', 'stox_tb_fund_insurancekeystatitic', 'stox_tb_fund_keystatistics', 'stox_tb_fund_ownership_new', 'stox_tb_fund_securitiesbalancesheet', 'stox_tb_fund_securitiescashflowstatement', 'stox_tb_fund_securitiescashflowstatement_gt', 'stox_tb_fund_securitiesincomestatement', 'stox_tb_fund_securitieskeystatitic', 'stox_tb_hose_foreignertrading', 'stox_tb_hose_totaltrading', 'stox_tb_hose_trading','stox_tb_industry', 'stox_tb_ipo', 'stox_tb_largeshareholders', 'stox_tb_marketinfo', 'stox_tb_outstandingshare', 'stox_tb_priceadjusted', 'stox_tb_refe_keyofficers', 'stox_tb_stocksinfo', 'stox_tb_upcom_marketinfo');
        //$tables = array('stox_tb_upcom_stocksinfo', 'stox_tb_vndirectmarketdata');
        //$tables = array('stox_tb_industry','Stox_tb_Company','Stox_tb_fund_Ownership_New','Stox_tb_Outstandingshare','Stox_tb_refe_KeyOfficers','stox_tb_LargeShareHolders','stox_tb_fund_CompanyBalanceSheet','stox_tb_fund_CompanyIncomeStatement','stox_tb_fund_CompanyCashFlowStatement','stox_tb_fund_KeyStatistics','stox_tb_fund_BankBalanceSheet','stox_tb_fund_BankIncomeStatement','stox_tb_fund_BankCashFlowStatement','stox_tb_fund_BankKeyStatistics','Stox_tb_Fund_SecuritiesBalanceSheet','stox_tb_fund_SecuritiesIncomeStatement','stox_tb_fund_SecuritiesCashFlowStatement_GT','stox_tb_fund_SecuritiesCashFlowStatement','Stox_tb_fund_SecuritiesKeyStatitic','Stox_tb_Fund_InsuranceBalanceSheet','stox_tb_fund_InsuranceIncomeStatement','stox_tb_fund_InsuranceCashFlowStatement_GT','stox_tb_fund_InsuranceCashFlowStatement','Stox_tb_fund_InsuranceKeyStatitic');
//
//        $a = DB::table('stox_tb_upcom_stocksinfo')->first();
//        print_r($a);
//        exit();

        foreach ($tables as $table) {
            $idCol = 'ID';
            if (strtolower($table) == 'stox_tb_ipo') {
                $idCol = 'IPOID';
            }
            if (strtolower($table) == 'stox_tb_upcom_marketinfo') {
                $idCol = 'MARKET_INFO_ID';
            }

            $lastId = 0;
            $lastIdInMyDB = DB::connection('mongodb2')->table($table)->orderBy($idCol, 'DESC')->first();
            if ($lastIdInMyDB) {
                if (!empty($lastIdInMyDB[$idCol])) {
                    $lastId = $lastIdInMyDB[$idCol];
                } else {
                    echo $table . " khong ton tai cot ".$idCol."\n";
                    return 1;
                }

            }

            $countRow = DB::table($table)->where($idCol, '>', $lastId)->count();

            for ($i = 0; $i <= $countRow / $per_page; $i++) {
                $rawData = DB::table($table)->orderBy($idCol)->where($idCol, '>', $lastId)->limit($per_page)->get();

                foreach ($rawData as $rawDatum) {
                    $this->info("Copying table {$table} " . (number_format($i / $countRow * $per_page * 100, 2) . "%"));
                    $rawDatum = (array) $rawDatum;
                    // Trim all
                    foreach ($rawDatum AS $k => $value) {
                        $rawDatum[$k] = trim($value);
                    }

                    $rawDatum[$idCol] = (int) $rawDatum[$idCol];

                    // Sửa lỗi ticker có dấu tab ở cuối dòng của Fiin và cắt ngày tháng ra để tìm dễ hơn
                    if (strtolower($table) === 'stox_tb_hose_foreignertrading') {
                        $rawDatum['stock_code'] =  preg_replace("/\s+/", "", $rawDatum['stock_code']);
                        $rawDatum['date_only'] = date("d/m", strtotime($rawDatum['trading_date']));
                        $rawDatum['year_only'] = date("Y", strtotime($rawDatum['trading_date']));
                        $rawDatum['month_only'] = date("m", strtotime($rawDatum['trading_date']));
                        $rawDatum['day_only'] = date("d", strtotime($rawDatum['trading_date']));
                    }
                    if (strtolower($table) === 'stox_tb_hose_trading') {
                        $rawDatum['StockSymbol'] =  preg_replace("/\s+/", "", $rawDatum['StockSymbol']);
                        $rawDatum['date_only'] = date("d/m", strtotime($rawDatum['DateReport']));
                        $rawDatum['year_only'] = date("Y", strtotime($rawDatum['DateReport']));
                        $rawDatum['month_only'] = date("m", strtotime($rawDatum['DateReport']));
                        $rawDatum['day_only'] = date("d", strtotime($rawDatum['DateReport']));
                    }

                    if (strtolower($table) === 'stox_tb_stocksinfo') {
                        $rawDatum['code'] =  preg_replace("/\s+/", "", $rawDatum['code']);
                        $rawDatum['date_only'] = date("d/m", strtotime($rawDatum['trading_date']));
                        $rawDatum['year_only'] = date("Y", strtotime($rawDatum['trading_date']));
                        $rawDatum['month_only'] = date("m", strtotime($rawDatum['trading_date']));
                        $rawDatum['day_only'] = date("d", strtotime($rawDatum['trading_date']));
                    }

                    if (strtolower($table) === 'stox_tb_upcom_stocksinfo') {
                        $rawDatum['code'] =  preg_replace("/\s+/", "", $rawDatum['code']);
                        $rawDatum['date_only'] = date("d/m", strtotime($rawDatum['trading_date']));
                        $rawDatum['year_only'] = date("Y", strtotime($rawDatum['trading_date']));
                        $rawDatum['month_only'] = date("m", strtotime($rawDatum['trading_date']));
                        $rawDatum['day_only'] = date("d", strtotime($rawDatum['trading_date']));

                    }

                    if (strtolower($table) === 'stox_tb_outstandingshare') {
                        $rawDatum['Ticker'] =  preg_replace("/\s+/", "", $rawDatum['Ticker']);
                        $rawDatum['date_only'] = date("d/m", strtotime($rawDatum['UpdateDate']));
                        $rawDatum['year_only'] = date("Y", strtotime($rawDatum['UpdateDate']));
                        $rawDatum['month_only'] = date("m", strtotime($rawDatum['UpdateDate']));
                        $rawDatum['day_only'] = date("d", strtotime($rawDatum['UpdateDate']));
                    }

                    DB::connection('mongodb2')->table($table)->insert($rawDatum);
                    $lastId = $rawDatum[$idCol];
                }
                echo $table . '- ' . $i."\n";
                //Sleep(1);
            }
        }
        $this->info("DONE!");
        return 1;
    }
}
