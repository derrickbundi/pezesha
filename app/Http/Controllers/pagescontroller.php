<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cache;
use Http;
use League\Csv\Reader;
use League\Csv\Statement;
use DB;
use App\Models\Csv;

class pagescontroller extends Controller
{
    public function __construct() {
        $ts = '20' . date("ymdhis");
        $hash = md5($ts.config('services.marvel_private_key').config('services.marvel_public_key'));
        $this->fetch_characters = config('services.marvel_url').'v1/public/characters?ts='.$ts.'&apikey='.config('services.marvel_public_key').'&hash='.$hash;
    }
    public function home() {
        if(Cache::has('fetch_')) {
            $data = Cache::get('fetch_');
        } else {
            //if  no data cached fetch them from endpoint
            $cache = $this->display_characters();
            $data = Cache::get('fetch_');
        }
        return view('index', compact('data'));
    }
    public function import_csv() {
        $csvs = Csv::inRandomOrder()->limit(10)->get();
        return view('pages.import_csv',compact('csvs'));
    }
    public function import_data() {
        DB::connection()->disableQueryLog();
        set_time_limit(0);

        DB::table('csvs')->delete();

        $csv = Reader::createFromPath(request()->file('file'), 'r');
        $csv->setHeaderOffset(0);
        $stmt = Statement::create();

        $records = $stmt->process($csv);

        //total rows of data 541909
        
        foreach ($records as $record) {
            try {
                $result = [
                    'invoice_no' => $record['InvoiceNo'],
                    'stock_code' => $record['StockCode'],
                    'description' => $record['Description'],
                    'quantity' => $record['Quantity'],
                    'invoice_date' => $record['InvoiceDate'],
                    'unit_price' => $record['UnitPrice'],
                    'customer_id' => $record['CustomerID'],
                    'country' => $record['Country']
                ];
                Csv::create($result);
            } catch (\Throwable $th) {
                //throw $th;
                continue;
            }
        }
        return redirect()->back();
    }
    public function display_characters() {
        $client = new Client;
        $resp = $client->get($this->fetch_characters);
        $data = json_decode($resp->getBody());
        return Cache::put('fetch_', $data->data->results, 60);
    }
}
