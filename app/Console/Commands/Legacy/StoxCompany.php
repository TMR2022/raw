<?php

namespace App\Console\Commands;

use App\Models\StoxMongo\Industry;
use Illuminate\Console\Command;

class StoxCompany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stox:company';

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
        // $existing = ["AAA","AAM","ABR","ACC","ACE","ADC","ADP","AGC","AGD","ALV","AMC","AME","BED","BGM","BHC","BHT","BHV","BKC","BMI","BMP","BPC","BT6","BTC","CAN","CII","CNT","COM","CYC","DCC","DCT","CLC","DDM","DHA","DHG","DIC","DMC","DNP","DPC","DPM","DPR","DQC","DRC","DTT","DXP","DXV","FBT","FMC","FPC","FPT","GIL","GMC","GMD","GTA","HAP","HAS","HAX","HBC","HBD","HDC","HMC","HPG","HRC","HSI","HT1","HTV","ICF","IFS","IMP","ITA","KDC","KHA","KHP","KMR","L10","LAF","LBM","LGC","LSS","MCP","MCV","MHC","MPC","NAV","NHC","NKD","NSC","NTL","PAC","PET","PGC","PIT","PJT","PMS","PNC","PPC","PVD","PVT","RAL","REE","RHC","RIC","SAF","SAM","SAV","SBT","SC5","SCD","SDN","SFC","SFI","SFN","SGC","SGH","SGT","SHC","SJ1","SJD","SJS","SMC","SSC","ST8","STB","TAC","TCM","TCR","TCT","TDH","TMC","TMS","TNA","TNC","TPC","TRC","TRI","TS4","TSC","TTC","STC","STP","SVC","VE9","VFR","VMC","VNC","TTF","TTP","TYA","UIC","UNI","VFC","VGP","VHC","VHG","VIC","VID","VIP","VIS","VKP","VNE","VNM","VNS","VPK","VPL","VSC","VSH","VTA","VTB","VTC","VTO","PVE","PVI","PVS","QNC","RCL","S12","S55","S64","S91","S96","S99","SAP","SCC","SCJ","ABT","ACL","AGF","ALP","ALT","ANV","ASP","BBC","BBT","BHS","BMC","BLF","ACB","B82","BBS","BCC","BTH","BTS","C92","CAP","CDC","CIC","CID","CJC","CMC","CSG","CTB","CTC","CTN","DAC","DAE","DBC","DCS","DHI","DST","DTC","EBS","GHA","HAI","HBE","HCC","HCT","HEV","HHC","HJS","HLY","HNM","HPS","HSC","HTP","HUT","ILC","KBC","KMF","L18","L43","L62","LBE","LTC","LUT","MCO","MEC","MIC","MMC","NBC","NGC","NLC","NPS","NST","NTP","NVC","ONE","PAN","PGS","PJC","PLC","POT","PPG","PSC","PTC","PTS","PVC","SD2","SD3","SD4","SD5","SD6","SD7","SD9","SDA","SDC","SDD","SDJ","SDS","SDT","SDY","SGD","SIC","SJC","SJE","SJM","SNG","SRA","SRB","SSS","TBC","TC6","TJC","TKU","TLC","TLT","TNG","TPH","TST","TV4","TXM","VBH","VC2","VC3","VC5","VC6","VC7","VCS","VDL","VNR","VSP","VTL","VTS","VTV","XMC","YBC","YSC","SZL","VNA","DCL","VSG","SPP","STL","CCM","KKC","VCG","VE1","DC4","SSM","TDN","THB","TBX","BAS","HLA","OPC","L61","TRA","PVF","HSG","KSH","LCG","BST","DHT","MKV","PVA","SD8","TCS","THT","TPP","V11","VGS","HAG","SVI","CAD","PVG","VCC","PTM","SEB","MTG","PNJ","QTC","NBB","VHL","BCI","QST","VST","HLC","HT2","ICG","SDP","SKS","HVT","SHB","VC1","DZM","ECI","TMP","VCB","BVH","S74","HOM","MDC","D2D","CTG","DHC","NBP","EID","CTM","CSM","VNT","VNL","PHR","SED","DAD","PVX","DIG","VNI","VPH","ATA","HLG","RDP","SDU","MCG","NAG","PHT","VMG","PDC","EFI","SRC","LGL","PMC","ITC","TV2","TIC","GGG","TIE","ABI","CFC","DDN","DNT","HIG","KMT","MAS","PPP","TCO","TGP","VPC","SRF","HAD","SDH","TMX","DBT","EIB","TNM","GTH","API","CSC","VC9","VIT","MSN","CVT","PHC","TH1","GDT","HVG","BXH","TV3","TIX","HDO","PSP","CT3","BTP","PGD","GLT","MHL","DVP","TKC","IME","LM3","LIX","TTR","ITD","PTP","DID","VNG","DNC","V15","SHN","LO5","VFG","SQC","DBM","L44","HGM","DVD","DXG","SDG","BMJ","UDJ","TMW","MAC","TCL","PGT","HST","SHI","AMV","KSS","CTD","SEC","V12","ASM","HHL","PTG","TAG","FDC","LHC","KSB","INN","CPC","CMG","NHW","HDM","HDG","TMT","BDB","NT2","TVG","HPL","KDH","TTG","APC","TLG","REM","STG","PSB","VQC","KBE","TBT","HFC","CTI","DL1","VBC","SDB","BTW","IHK","CMT","CKV","DGT","PHH","NVT","DAG","NDC","TLH","SNC","TCB","LHG","QHD","TET","SCB","LPB","HDB","OCB","SGB","HBB","ABB","TPB","KLB","DAB","PNB","VAB","NVB","NAB","GDB","VPB","L35","NVN","SDE","PTH","BTG","BTT","STS","VNH","DNS","PPI","VES","VKD","IJC","CCI","PVL","V21","TNB","VT1","POM","LIG","OGC","HTC","HPB","CHP","SSF","VIA","TDC","MCC","CT6","SPD","JSC","KSD","PTT","NBW","DAP","IMT","LCC","DLR","DNY","VCM","VCR","VHF","NTB","NSN","CX8","SPM","PSL","DCB","GB","MBB","MSB","VIB","TNT","KHB","DPP","IN4","SBC","MKP","HU1","PXT","SBA","KSC","PXS","IDV","DTL","GER","VNX","PDN","PXI","GDW","BWA","HPT","VXB","DBF","CMV","PXM","PVR","DLG","NNC","BCE","VE3","CMI","MIH","TSM","DXL","GTT","NHS","DC2","UDC","VHH","VIR","LCS","NHA","ICI","DTA","WTC","VDN","VCT","LDP","KSA","PFV","VCH","DRH","ND2","MJC","PMT","SD1","VRC","HMH","SMT","VLA","HHG","VE2","PDR","KBT","PCT","HPP","QCG","CVN","VCV","CLG","BVG","WSB","DNF","WCS","MIM","BXD","HCI","PIV","SMB","SHV","SCL","NET","BID","PVV","VOS","IDJ","SPC","DTV","S27","SDK","SHP","MAX","SCO","SEL","HAT","NIS","VMD","C32","MTP","POV","VTF","PTL","HVX","TV1","OCH","PEC","TDW","KTB","CTA","APP","TIG","QCC","SMA","ARM","ELC","DSN","DLV","HTB","KAC","HQC","LM7","STU","KTT","THA","HVC","HTL","PX1","DVH","SCR","SGS","CMX","LM8","LCD","PFL","PRC","AVF","VTI","CMS","VNF","VKC","MNC","THV","PXL","EVE","MCL","VAT","PV2","HTI","VSI","BSC","VLF","KST","HDA","S33","PCG","TVD","KTS","SSG","PTD","TSB","CLW","PPS","D26","NOS","MDG","NKG","NSP","MTH","VCF","KCE","DNM","D11","MCF","DLD","FBA","VCA","PXA","CCL","PTI","MDF","VDT","H11","PSG","HU3","CZC","TIS","SWC","C47","DLC","FDG","DIH","GFC","NDN","SGBTB","SNTB","SST","SBTN","SDV","HPR","GHC","CNG","VIE","CTX","BAOVIETBANK","WEB","VBB","PGB","TB","BAB","MDB","MHBB","VTNB","AGRB","SEAB","EAB","FCB","IDI","TNY","JVC","SDI","STT","CI5","PTB","INC","CIG","C21","L14","GMX","PPE","PGI","HOT","THG","BVN","SVN","CTV","BIC","DNL","FDT","LCM","SVT","FLC","TDS","MEF","HFX","PJS","BRC","LTG","STV","SAB","HHS","ASA","GSP","KHL","LAS","DRL","NTW","GAS","DHL","NNT","LKW","MED","DHM","FCN","MTC","VE8","SII","NBS","QNS","ITQ","PTK","SPI","SLS","CLP"];
        $existing = array();
        \App\Models\Stox\StoxCompany::with('keyOfficers')->chunk(100, function ($companies) use ($existing) {
        //$companies = \App\Models\StoxMongo\StoxCompany::with('keyOfficers')->where('Ticker', 'VPD')->get();

            foreach ($companies as $company) {
//                if (in_array($company->Ticker, $existing)) {
//                    continue;
//                }
                echo 'Đang xử lý công ty ' . $company->Ticker;
                //print_r($company->keyOfficers);

                $insertToRaw = (object)array();
                $insertToRaw->ticker = $company->Ticker;
                $insertToRaw->taxCode = $company->ShareType;
                $insertToRaw->name = $company->ShortName;
                $insertToRaw->nameEng = $company->EnglishName;
                $insertToRaw->about = $company->CompanyProfile;
                $insertToRaw->aboutEng = $company->eCompanyProfile;
                // $insertToRaw->logo = ''; // Không có thông tin
                // $insertToRaw->type = ''; // CompanyTypeBeforeListed gần đúng nhưng ko phải

                if ($company->createDate != null) {
                    $insertToRaw->establishment = date("d/m/Y", strtotime($company->createDate));
                }

                $insertToRaw->address = $company->RegistedOffice . ', ' . $company->DistrictID . ', ' . $company->CityID;

                $exchangers = ['HOSE', 'HNX', 'OTC', 'UPCOM', 'STOP'];
                if ($company->ExchangeID != null && isset($exchangers[$company->ExchangeID])) {
                    $insertToRaw->exchanger = $exchangers[$company->ExchangeID];
                }

                $insertToRaw->product = $company->PrimaryProduct;
                $insertToRaw->history = $company->HistoryDev;
                $insertToRaw->historyEng = $company->eHistoryDev;
                $insertToRaw->achievement = $company->PosCompany;
                $insertToRaw->achievementEng = $company->ePosCompany;

                $insertToRaw->capital = (int)$company->CapitalFund;

                $industry = Industry::where('ID', $company->IndustryID)->first();
                if ($industry) {
                    $insertToRaw->industryCode = $industry->Code;
                }

                $insertToRaw->vols = (int)$company->ShareIssue;
                $insertToRaw->voso = (int)$company->ShareCirculate;
                $insertToRaw->shareConsultant = $company->CTCKID;
                $insertToRaw->phone = $company->Telephone_CC . $company->Telephone_AC . $company->Telephone_Number;
                $insertToRaw->fax = $company->Fax_CC . $company->Fax_AC . $company->Fax_Number;
                // $insertToRaw->email = ''; // Không có thông tin
                $insertToRaw->website = $company->WebsiteHomepage;


                // Key Officers
                if ($company->keyOfficers && count($company->keyOfficers) > 0) {
                    $insertToRaw->leaderships = [];
                    $insertToRaw->shareHolders = [];
                    foreach ($company->keyOfficers as $keyOfficer) {
                        $insertToRaw->leaderships[] = (object)array(
                            'code' => $keyOfficer->ID,
                            'name' => ($keyOfficer->Gender == 1) ? ('Ông ' . $keyOfficer->Name) : ('Bà ' . $keyOfficer->Name),
                            'position' => $keyOfficer->cvhientai,
                            'positionEng' => $keyOfficer->ecvhientai
                        );

                        $insertToRaw->shareHolders[] = (object)array(
                            'code' => 'stox_tb_refe_keyofficers__' . $keyOfficer->ID,
                            'shareCount' => (int)$keyOfficer->CPCanhan,
                            'lastUpdate' => date('d/m/Y', strtotime($keyOfficer->UpdateDate)),
                            'name' => $keyOfficer->Name
                        );
                    }
                }

                // Share Holders
                if ($company->largeShareHolders && count($company->largeShareHolders) > 0) {
                    if (empty($insertToRaw->shareHolders)) {
                        $insertToRaw->shareHolders = [];
                    }
                    foreach ($company->largeShareHolders as $shareHolder) {
                        $insertToRaw->shareHolders[] = (object)array(
                            'code' => 'stox_tb_largeshareholders__' . $shareHolder->ID,
                            'shareCount' => $shareHolder->QttyOwnedShares,
                            'lastUpdate' => date('d/m/Y', strtotime($shareHolder->UpdateDate)),
                            'name' => $shareHolder->Name,
                            'nameEng' => $shareHolder->eName,
                            'ticker' => $shareHolder->Ticker,
                        );
                    }
                }

                // Company type
                $balanceSheets = [];
                $incomeStatements = [];
                switch ($company->TypeID) {
                    case 0:
                        $insertToRaw->companyType = 'bank';
                        $balanceSheets = $company->bankBalanceSheets;
                        $incomeStatements = $company->bankIncomeStatements;
                        break;
                    case 1:
                        $insertToRaw->companyType = 'fund';
                        $balanceSheets = $company->fundBalanceSheets;
                        $incomeStatements = $company->fundIncomeStatements;
                        break;
                    case 2:
                        $insertToRaw->companyType = 'company';
                        $balanceSheets = $company->companyBalanceSheets;
                        $incomeStatements = $company->companyIncomeStatements;
                        break;
                    case 3:
                        $insertToRaw->companyType = 'insurance';
                        $balanceSheets = $company->insuranceBalanceSheets;
                        $incomeStatements = $company->insuranceIncomeStatements;
                        break;
                    case 4:
                        $insertToRaw->companyType = 'securities';
                        $balanceSheets = $company->securitiesBalanceSheets;
                        $incomeStatements = $company->securitiesIncomeStatements;
                        break;
                }

                // BalanceSheet
                if ($balanceSheets && count($balanceSheets) > 0) {
                    foreach ($balanceSheets as $balanceSheet) {
                        $key = $balanceSheet->YearReport . '_q5';
                        if ($balanceSheet->LengthReport != 5) {
                            $key = $balanceSheet->YearReport . '_q' . $balanceSheet->LengthReport;
                        }
                        //$insertToRaw->balanceSheets[$key] = $balanceSheet;

                        $sendBalanceSheet = (object)array();
                        $sendBalanceSheet->balanceSheet = $balanceSheet->toArray();
                        unset($sendBalanceSheet->balanceSheet['ID']);
                        unset($sendBalanceSheet->balanceSheet['UpdateReport']);
                        unset($sendBalanceSheet->balanceSheet['YearReport']);
                        unset($sendBalanceSheet->balanceSheet['StartDate']);
                        unset($sendBalanceSheet->balanceSheet['EndingDate']);
                        unset($sendBalanceSheet->balanceSheet['Length']);
                        unset($sendBalanceSheet->balanceSheet['LengthReport']);
                        unset($sendBalanceSheet->balanceSheet['Resource']);
                        unset($sendBalanceSheet->balanceSheet['Comments']);
                        unset($sendBalanceSheet->balanceSheet['Ticker']);
                        unset($sendBalanceSheet->balanceSheet['F2_Chenhlech']);
                        unset($sendBalanceSheet->balanceSheet['F2_Chenhlech_Comments']);
                        unset($sendBalanceSheet->balanceSheet['Version']);
                        unset($sendBalanceSheet->balanceSheet['Puplished']);
                        unset($sendBalanceSheet->balanceSheet['Audited']);
                        unset($sendBalanceSheet->balanceSheet['F9_Chenhlech']);
                        unset($sendBalanceSheet->balanceSheet['F9_Chenhlech_Comments']);

                        foreach ($sendBalanceSheet->balanceSheet as $k => $item) {
                            $sendBalanceSheet->balanceSheet[$k] = number_format((double)$item, 0, "", "");
                        }
                        $sendBalanceSheet->source = 'STOX';
                        $sendBalanceSheet->ticker = $company->Ticker;
                        $milestones = array();
                        $milestones['balanceSheet'] = $key;

                        $this->sendData($sendBalanceSheet, $milestones);
                    }
                }

                // IncomeStatement
                if ($incomeStatements && count($incomeStatements) > 0) {
                    foreach ($incomeStatements as $incomeStatement) {
                        $key = $incomeStatement->YearReport . '_q5';
                        if ($incomeStatement->LengthReport != 5) {
                            $key = $incomeStatement->YearReport . '_q' . $incomeStatement->LengthReport;
                        }

                        $sendIncomeStatement = (object)array();
                        $sendIncomeStatement->incomeStatement = $incomeStatement->toArray();
                        unset($sendIncomeStatement->incomeStatement['ID']);
                        unset($sendIncomeStatement->incomeStatement['UpdateReport']);
                        unset($sendIncomeStatement->incomeStatement['YearReport']);
                        unset($sendIncomeStatement->incomeStatement['StartDate']);
                        unset($sendIncomeStatement->incomeStatement['EndingDate']);
                        unset($sendIncomeStatement->incomeStatement['Length']);
                        unset($sendIncomeStatement->incomeStatement['LengthReport']);
                        unset($sendIncomeStatement->incomeStatement['Resource']);
                        unset($sendIncomeStatement->incomeStatement['Comments']);
                        unset($sendIncomeStatement->incomeStatement['Ticker']);
                        unset($sendIncomeStatement->incomeStatement['Version']);
                        unset($sendIncomeStatement->incomeStatement['Puplished']);
                        unset($sendIncomeStatement->incomeStatement['Audited']);
                        foreach ($sendIncomeStatement->incomeStatement as $k => $item) {
                            $sendIncomeStatement->incomeStatement[$k] = number_format((double)$item, 0, "", "");
                        }
                        $sendIncomeStatement->source = 'STOX';
                        $sendIncomeStatement->ticker = $company->Ticker;
                        $milestones = array();
                        $milestones['incomeStatement'] = $key;

                        $this->sendData($sendIncomeStatement, $milestones);
                    }
                }
                // $insertToRaw->childCompanies = 'hahaha';
                // $insertToRaw->relationshipCompanies = 'hahaha';

                $this->sendData($insertToRaw);
                //}
            }
        });
    }

    function sendData($result, $milestones = [])
    {
        $start =  round(microtime(true) * 1000);
        $sendData = [];
        foreach ($result as $key => $value) {
            if (!empty($value)) {
                // $milestones_time = date('Y-m-d', time());
                $milestones_time = 9999;
                if (!empty($milestones[$key])) {
                    $milestones_time = $milestones[$key];
                }
                // TODO: Bỏ selected = true
                $sendData[] = (object)array(
                    'table' => 'company',
                    'code' => $result->ticker,
                    'field_name' => $key,
                    'milestones_time' => $milestones_time,
                    'values' => [(object)['source' => 'STOX', 'value' => $value, 'selected' => true]]
                );
            }
        }

        $sendFinal = (object)array('data' => $sendData);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('RAW_DB_API') . '/line/save-multiple',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($sendFinal),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;
        $stop =  round(microtime(true) * 1000);
        echo ($stop - $start). ' Đã lưu công ty ' . $result->ticker . "\n";
    }
}
