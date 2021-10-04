<?php

namespace App\Console\Commands;

use App\Models\CompanyTrading\CompanyHoseForeignerTrading;
use App\Models\CompanyTrading\CompanyHoseTrading;
use App\Models\CompanyTrading\CompanyOutstandingShare;
use App\Models\CompanyTrading\CompanyStocksInfo;
use App\Models\CompanyTrading\CompanyUpcomTrading;
use Illuminate\Console\Command;

class FindEndOfQuater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'find_end_of_quarter';

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
        $tickers = \App\Models\StoxMongo\StoxCompany::select('Ticker')->get()->pluck('Ticker');

        foreach ($tickers as $ticker) {


            for ($year = 2000; $year <= date('Y', time()); $year++) {
                for ($m = 1; $m <= 12; $m++) {
                    $month = str_pad($m, 2, '0', STR_PAD_LEFT);
                    if ($year . '_' . $month >= date('Y_m', time())) {
                        continue;
                    }

                    echo 'Searching ' . $ticker . ' - ' . $year . ' - ' . $month . "\n";

                    $tables = ['CompanyHoseForeignerTrading', 'CompanyHoseTrading', 'CompanyStocksInfo', 'CompanyUpcomTrading', 'CompanyOutstandingShare'];
                    foreach ($tables as $table) {
                        $endOfMonth = null;
                        if ($table == 'CompanyHoseForeignerTrading') {
                            $endOfMonth = CompanyHoseForeignerTrading::where('stock_code', $ticker)->where('month_only', (string)$month)->where('year_only', (string)$year)->orderBy('day_only', 'DESC')->first();
                        } else if ($table == 'CompanyHoseTrading') {
                            $endOfMonth = CompanyHoseTrading::where('StockSymbol', $ticker)->where('month_only', (string)$month)->where('year_only', (string)$year)->orderBy('day_only', 'DESC')->first();
                        } else if ($table == 'CompanyStocksInfo') {
                            $endOfMonth = CompanyStocksInfo::where('code', $ticker)->where('month_only', (string)$month)->where('year_only', (string)$year)->orderBy('day_only', 'DESC')->first();
                        } else if ($table == 'CompanyUpcomTrading') {
                            $endOfMonth = CompanyUpcomTrading::where('code', $ticker)->where('month_only', (string)$month)->where('year_only', (string)$year)->orderBy('day_only', 'DESC')->first();
                        } else if ($table == 'CompanyOutstandingShare') {
                            $endOfMonth = CompanyOutstandingShare::where('Ticker', $ticker)->where('month_only', (string)$month)->where('year_only', (string)$year)->orderBy('day_only', 'DESC')->first();
                        }
                        if ($endOfMonth) {
                            $endOfMonth->is_end_of_month = true;
                            if ($month == '03' || $month == '06' || $month == '09' || $month == '12') {
                                $endOfMonth->is_end_of_quarter = true;
                            } else {
                                $endOfMonth->is_end_of_quarter = false;
                            }
                            $endOfMonth->save();
                            echo 'Saved ' . $ticker . ' - ' . $year . ' - ' . $month . " - " . $endOfMonth->day_only . "\n";
                        }
                    }
                }
            }
        }
		
		return 1;

    }
}
