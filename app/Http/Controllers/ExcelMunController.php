<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Export_mun;
use App\Bid;
use Maatwebsite\Excel\Facades\Excel;

class ExcelMunController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {

        return Excel::download(new Export_mun, 'bids_mun.xlsx');

    }


}
