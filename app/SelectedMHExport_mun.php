<?php
namespace App;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SelectedMHExport_mun implements FromView
{
    public function view(): View
    {
        return view('proposed.selected_h_per_m_mun', [
            'users' => User::all()
        ]);
    }
}
