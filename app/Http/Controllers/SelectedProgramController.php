<?php

namespace App\Http\Controllers;

use App\SelectedProgram;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectedProgramController extends Controller
{
    public function take(Request $request, $id)
    {
        $id_of_user = Auth::user()->id;
        $user_of_program = User::where('id', $id_of_user)->first();
        $school_id = $user_of_program->id;

        $selected_program = new SelectedProgram([
            'proposed_program_id' => $id,
            'school_id' => $school_id,
        ]);

        $selected_program->save();

        return redirect('/')->with('success', 'Программа взята!');
    }


    public function show(SelectedProgram $selected_program)
    {
        return view('proposed.selected_show', compact('selected_program'));
    }

    public function delete(SelectedProgram $selected_program)
    {
        $selected_program->delete();

        return redirect('/');
    }

}
