<?php

namespace App\Console\Commands;

use App\Models\Master\RawCompany;
use Illuminate\Console\Command;
use PHPHtmlParser\Dom;

class hosocongty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hsct';

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
        for ($page = 39999; $page <= 40000; $page++) {
            $textData = '';
            do {
                echo 'Đang lấy trang số ' . $page ."\n";
                $textData = $this->getPage($page);
               // sleep(1);
            } while (strpos($textData, 'Mã số thuế') === false);

            $dom = new Dom();
            $dom->loadStr($textData);
            $companies = $dom->find('.hsdn li');

            foreach ($companies as $company) {
                $firstChild = $company->firstChild();
                try {
                    $link = 'https://hosocongty.vn/' . $firstChild->find('a')->getAttribute('href');
                    $name = $firstChild->find('a')->text;

                    // $nextDivText = $firstChild->nextSibling()->innerHtml;
                    $taxCode = $firstChild->nextSibling()->find('a')->text;
                    $address = trim(str_replace('Mã số thuế:', '', $firstChild->nextSibling()->text));

                    $newComany = new RawCompany();
                    $newComany->link = $link;
                    $newComany->name = $name;
                    $newComany->tax_code = $taxCode;
                    $newComany->address = $address;
                    $newComany->save();
                } catch (\Exception $e) {
                    //echo $e->getMessage();
                }
            }
        }
    }

    public function getPage($pageNumber) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://hosocongty.vn/2281144/page-'.$pageNumber,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'authority: hosocongty.vn',
                'cache-control: max-age=0',
                'upgrade-insecure-requests: 1',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
                'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                'sec-fetch-site: none',
                'sec-fetch-mode: navigate',
                'sec-fetch-user: ?1',
                'sec-fetch-dest: document',
                'accept-language: vi,vi-VN;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
                'cookie: _ga=GA1.2.1942275582.1605062499; __gads=ID=f0c654f14ba41dd1-22aeb83eafc400e9:T=1605062499:RT=1605062499:S=ALNI_MZkMezzmPd2iMj6I2_BKBmElyUJ2w; __cfduid=d5b4c7c74a2ebce8e173b78f4044af1171609384762; PHPSESSID=ck66dhp1u279org3430v2rsu5a; _gid=GA1.2.1716130555.1609904775; _gat_gtag_UA_50410523_18=1'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
