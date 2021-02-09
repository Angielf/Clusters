<?php
namespace App;

use App\SelectedProgram;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;

class SelectedProgramsExport_mun implements FromView
{
    public function view(): View
    {
        $user = Auth::user();
        return view('proposed.selected_programs_download_mun', [
            'selected_programs' => SelectedProgram::all(),
            'user' => $user,
        ]);
    }
}
