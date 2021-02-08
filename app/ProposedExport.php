<?php
namespace App;

use App\Proposed;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProposedExport implements FromView
{
    public function view(): View
    {
        return view('proposed.proposed_programs_download', [
            'proposed_programs_all' => Proposed::all()
        ]);
    }
}
