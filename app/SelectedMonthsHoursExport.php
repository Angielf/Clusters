<?php
namespace App;

use App\SelectedMonthsHour;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SelectedMonthsHoursExport implements FromView
{
    public function view(): View
    {
        return view('proposed.selected_months_hours_list_reg', [
            'selected_months_hours' => SelectedMonthsHour::all()
        ]);
    }
}
