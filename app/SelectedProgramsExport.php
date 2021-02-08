<?php
namespace App;

use App\SelectedProgram;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SelectedProgramsExport implements FromView
{
    public function view(): View
    {
        return view('proposed.selected_programs_download', [
            'selected_programs' => SelectedProgram::all()
        ]);
    }
}
