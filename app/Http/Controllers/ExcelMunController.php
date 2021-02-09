<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Export_mun;
use App\MonthsHoursExport_mun;
use App\MHExport_mun;
use App\ProposedExport_mun;
use App\SelectedProgramsExport_mun;
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

    public function m_h_export()
    {
        return Excel::download(new MHExport_mun, 'hours_per_months_mun.xlsx');
    }

    public function proposed_programs_export()
    {
        return Excel::download(new ProposedExport_mun, 'proposed_programs_export_mun.xlsx');
    }

    public function selected_programs_export()
    {
        return Excel::download(new SelectedProgramsExport_mun, 'selected_programs_export_mun.xlsx');
    }


}
