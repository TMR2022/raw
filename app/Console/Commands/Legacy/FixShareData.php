<?php

namespace App\Console\Commands\Legacy;

use App\Models\CompanyTrading\CompanyHoseForeignerTrading;
use App\Models\CompanyTrading\CompanyHoseTrading;
use App\Models\CompanyTrading\CompanyOutstandingShare;
use App\Models\CompanyTrading\CompanyStocksInfo;
use App\Models\CompanyTrading\CompanyUpcomTrading;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixShareData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix_share_data';

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

    /**.
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        CompanyHoseForeignerTrading::where('year_only', null)->chunkById(1000, function ($data) {
            foreach ($data as $datum) {
                $rawDatum = $datum->toArray();
                $datum->stock_code = preg_replace("/\s+/", "", $rawDatum['stock_code']);
                $datum->date_only = date("d/m", strtotime($rawDatum['trading_date']));
                $datum->year_only = date("Y", strtotime($rawDatum['trading_date']));
                $datum->month_only = date("m", strtotime($rawDatum['trading_date']));
				$datum->day_only = date("d", strtotime($rawDatum['trading_date']));

                $datum->save();

                echo 'CompanyHoseForeignerTrading '. $datum->id . "\n";
            }
        });

        CompanyHoseTrading::where('year_only', null)->chunkById(1000, function ($data) {
            foreach ($data as $datum) {
                $rawDatum = $datum->toArray();
                $datum->StockSymbol = preg_replace("/\s+/", "", $rawDatum['StockSymbol']);
                $datum->date_only = date("d/m", strtotime($rawDatum['DateReport']));
                $datum->year_only = date("Y", strtotime($rawDatum['DateReport']));
                $datum->month_only = date("m", strtotime($rawDatum['DateReport']));
				$datum->day_only = date("d", strtotime($rawDatum['DateReport']));
                $datum->save();
                echo 'CompanyHoseTrading '. $datum->id . "\n";
            }
        });

        CompanyStocksInfo::where('year_only', null)->chunkById(1000, function ($data) {
            foreach ($data as $datum) {
                $rawDatum = $datum->toArray();
                $datum->code = preg_replace("/\s+/", "", $rawDatum['code']);
				$datum->date_only = date("d/m", strtotime($rawDatum['trading_date']));
                $datum->year_only = date("Y", strtotime($rawDatum['trading_date']));
                $datum->month_only = date("m", strtotime($rawDatum['trading_date']));
                $datum->day_only = date("d", strtotime($rawDatum['trading_date']));

                $datum->save();

                echo 'CompanyStocksInfo '. $datum->id . "\n";
            }
        });


        CompanyUpcomTrading::where('year_only', null)->chunkById(1000, function ($data) {
            foreach ($data as $datum) {
                $rawDatum = $datum->toArray();
				$datum->code = preg_replace("/\s+/", "", $rawDatum['code']);
                $datum->date_only = date("d/m", strtotime($rawDatum['trading_date']));
                $datum->year_only = date("Y", strtotime($rawDatum['trading_date']));
                $datum->month_only = date("m", strtotime($rawDatum['trading_date']));
                $datum->day_only = date("d", strtotime($rawDatum['trading_date']));

                $datum->save();

                echo 'CompanyUpcomTrading '. $datum->id . "\n";
            }
        });

        CompanyOutstandingShare::where('year_only', null)->chunkById(1000, function ($data) {
            foreach ($data as $datum) {
                $rawDatum = $datum->toArray();
				$datum->Ticker = preg_replace("/\s+/", "", $rawDatum['Ticker']);
				$datum->date_only = date("d/m", strtotime($rawDatum['UpdateDate']));
                $datum->year_only = date("Y", strtotime($rawDatum['UpdateDate']));
                $datum->month_only = date("m", strtotime($rawDatum['UpdateDate']));
				$datum->day_only = date("d", strtotime($rawDatum['UpdateDate']));

                $datum->save();

                echo 'CompanyOutstandingShare '. $datum->id . "\n";
            }
        });

        echo 'DONE';
        return 1;
    }
}
