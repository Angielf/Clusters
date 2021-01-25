<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Export;
use App\MonthsHoursExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelRegionController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new Export, 'bids.xlsx');
    }

    public function months_hours_export()
    {
        return Excel::download(new MonthsHoursExport, 'months_hours.xlsx');
    }
}
