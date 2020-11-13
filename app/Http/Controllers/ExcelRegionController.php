<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Export;
use App\Bid;
use Maatwebsite\Excel\Facades\Excel;

class ExcelRegionController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {

        return Excel::download(new Export, 'bids.xlsx');

        // return Excel::store('Customer Data', function($excel) use ($bid_array){
        //     $excel->setTitle('Customer Data');
        //     $excel->sheet('Customer Data', function($sheet) use ($bid_array){
        //     $sheet->fromArray($bid_array, null, 'A1', false, false);
        //     });
        // })->download('xlsx');
    }


}
