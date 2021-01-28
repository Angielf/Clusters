<?php
namespace App;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MHExport implements FromView
{
    public function view(): View
    {
        return view('h_per_m', [
            'users' => User::all()
        ]);
    }
}
