<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Export;
use Maatwebsite\Excel\Facades\Excel;

class ExcelRegionController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new Export, 'users.xlsx');
    }
}
