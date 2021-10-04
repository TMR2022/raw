<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function test() {
        $a = DB::table('stox_tb_Company')->where('Ticker', 'ABT')->first();
        DB::connection('mysql2')->table('giang_company')->insert((array)$a);
        print_r($a);
        exit();
//        echo '<pre>';
//       // $tables =  DB::table('INFORMATION_SCHEMA.TABLES')->get();
//        //$tables =  DB::table('stox_tb_Company')->paginate(20);
//        echo '<table border="1" line-spacing="0">';
//        foreach ($tables as $key => $value) {
//            print_r($value);
//            echo '<tr>';
//            foreach ($value as $item) {
//                echo '<td>'.$item.'</td>';
//            }
//            echo '</tr>';
//        }
//        echo '</table>';
//        echo '</pre>';
//        exit();

//        $tables =  DB::table('INFORMATION_SCHEMA.COLUMNS')->where('TABLE_NAME', 'stox_tb_Company')->get();
//        echo '<pre>';
//        print_r($tables);
//        echo '</pre>';
//        exit();

    }
}
