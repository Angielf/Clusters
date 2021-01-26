<?php
namespace App;

use App\MonthsHour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthsHoursExport_mun implements FromView
{
    public function view(): View
    {
        return view('months_hours_list_mun', [
            'months_hours' => MonthsHour::get(),
            // 'id' => Auth::user()->getDistrict->id,
        ]);
    }
}
