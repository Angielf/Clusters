<?php
namespace App;

use App\MonthsHour;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthsHoursExport implements FromView
{
    public function view(): View
    {
        return view('clusters.months_hours_list_reg', [
            'months_hours' => MonthsHour::all()
        ]);
    }
}
