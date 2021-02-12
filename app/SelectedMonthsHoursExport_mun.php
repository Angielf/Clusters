<?php
namespace App;

use App\SelectedMonthsHour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SelectedMonthsHoursExport_mun implements FromView
{
    public function view(): View
    {
        return view('proposed.selected_months_hours_list_mun', [
            'selected_months_hours' => SelectedMonthsHour::get(),
        ]);
    }
}
