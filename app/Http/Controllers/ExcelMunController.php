<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Export_mun;
use App\MonthsHoursExport_mun;
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

    public function months_hours_export()
    {
        return Excel::download(new MonthsHoursExport_mun, 'months_hours_mun.xlsx');
    }


}
