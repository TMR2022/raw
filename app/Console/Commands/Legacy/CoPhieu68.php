<?php

namespace App\Console\Commands\Legacy;

use App\Models\Master\RawCompany;
use Illuminate\Console\Command;
use PHPHtmlParser\Dom;

class CoPhieu68 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cp68';

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
        // Sàn HOSE (id 1) 16 trang
//        for ($i = 1; $i <= 16; $i++) {
//            $textData = $this->getPage(1, $i);
//
//            $dom = new Dom();
//            $dom->loadStr($textData);
//            $tables = $dom->find('#begin_header table');
//            // echo $tables[2]->find('tbody')->innerHtml;
//            file_put_contents('hose.html', $tables[2]->innerHtml."\n", FILE_APPEND);
//        }

        for ($i = 1; $i <= 15; $i++) {
            $textData = $this->getPage(2, $i);

            $dom = new Dom();
            $dom->loadStr($textData);
            $tables = $dom->find('#begin_header table');
            // echo $tables[2]->find('tbody')->innerHtml;
            file_put_contents('hnx.html', $tables[2]->innerHtml."\n", FILE_APPEND);
        }

        for ($i = 1; $i <= 38; $i++) {
            $textData = $this->getPage(3, $i);

            $dom = new Dom();
            $dom->loadStr($textData);
            $tables = $dom->find('#begin_header table');
            // echo $tables[2]->find('tbody')->innerHtml;
            file_put_contents('upcom.html', $tables[2]->innerHtml."\n", FILE_APPEND);
        }
    }

    public function getPage($san, $page)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://www.cophieu68.vn/companylist.php?currentPage=' . $page . '&o=s&ud=a&stcid=' . $san,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Connection: keep-alive',
                'Cache-Control: max-age=0',
                'Upgrade-Insecure-Requests: 1',
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                'Sec-Fetch-Site: same-origin',
                'Sec-Fetch-Mode: navigate',
                'Sec-Fetch-User: ?1',
                'Sec-Fetch-Dest: document',
                'Referer: https://www.cophieu68.vn/companylist.php?currentPage=2&o=s&ud=a',
                'Accept-Language: vi,vi-VN;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
                'Cookie: PHPSESSID=hf4st8mogse2b1a61mgt7ovbj1; cp68screenwidth=1920; cp68screenheight=969; _ga=GA1.2.329864067.1610002485; _gid=GA1.2.271654588.1610002485; __gads=ID=134effef1f016baf-2242bed597c50092:T=1610002485:RT=1610002485:S=ALNI_Ma5cH4zmPocu50lVrUuLs3tZxb1cA; _gat=1'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }
}
