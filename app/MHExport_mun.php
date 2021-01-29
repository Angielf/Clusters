<?php
namespace App;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MHExport_mun implements FromView
{
    public function view(): View
    {
        return view('h_per_m_mun', [
            'users' => User::all()
        ]);
    }
}
