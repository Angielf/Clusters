<?php
namespace App;

use App\Proposed;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;

class ProposedExport_mun implements FromView
{
    public function view(): View
    {
        $user = Auth::user();
        return view('proposed.proposed_programs_download_mun', [
            'proposed_programs_all' => Proposed::all(),
            'user' => $user,
        ]);
    }
}
