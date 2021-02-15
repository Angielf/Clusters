<?php
namespace App;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Export_mun implements FromView
{
    public function view(): View
    {
        return view('export_mun', [
            'bids' => Bid::all()
        ]);
    }
}
