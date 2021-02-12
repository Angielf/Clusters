<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Export;
use App\MonthsHoursExport;
use App\SelectedMonthsHoursExport;
use App\MHExport;
use App\SelectedMHExport;
use App\ProposedExport;
use App\SelectedProgramsExport;
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

    public function m_h_export()
    {
        return Excel::download(new MHExport, 'hours_per_months.xlsx');
    }

    public function proposed_programs_export()
    {
        return Excel::download(new ProposedExport, 'proposed_programs_export.xlsx');
    }

    public function selected_programs_export()
    {
        return Excel::download(new SelectedProgramsExport, 'selected_programs_export.xlsx');
    }

    public function selected_months_hours_export()
    {
        return Excel::download(new SelectedMonthsHoursExport, 'seleted_months_hours.xlsx');
    }

    public function selected_m_h_export()
    {
        return Excel::download(new SelectedMHExport, 'selected_hours_per_months.xlsx');
    }
}
