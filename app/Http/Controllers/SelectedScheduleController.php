<?php

namespace App\Http\Controllers;

use App\SelectedProgram;
use App\SelectedSchedule;
use Illuminate\Http\Request;

class SelectedScheduleController extends Controller
{
    public function index($id)
    {
        $selected_program = SelectedProgram::where('id', $id)->first();

        return view('proposed.selected_schedule', compact('selected_program'));
    }

    public function add(Request $request, $id)
    {
        if($request->hasFile('selected_schedule')) {
            $file = $request->file('selected_schedule');
            $file_name = $id . time() . '.' . $request->selected_schedule->extension();
            $file->move(public_path() . '/files/selected_schedules/', $file_name);

            $selected_schedule = new SelectedSchedule([
                'filename' => $file_name,
                'selected_program_id' => $id,
            ]);

            $selected_schedule->save();

            return redirect('/')->with('success', 'Расписание добавлено!');
        }
    }

    public function delete(SelectedSchedule $selected_schedule)
    {
        $selected_schedule->delete();

        return redirect('/');
    }

    public function approve(SelectedSchedule $selected_schedule)
    {
        $selected_schedule->status = 1;
        $selected_schedule->save();

        return redirect('/');
    }
}
