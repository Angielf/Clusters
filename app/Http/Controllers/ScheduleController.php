<?php

namespace App\Http\Controllers;

use App\Program;
use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index($id)
    {
        $program = Program::where('id', $id)->first();

        return view('schedule', compact('program'));
    }

    public function add(Request $request, $id)
    {
        if($request->hasFile('schedule')) {
            $file = $request->file('schedule');
            $file_name = $id . time() . '.' . $request->schedule->extension();
            $file->move(public_path() . '/files/schedules/', $file_name);

            $schedule = new Schedule([
                'filename' => $file_name,
                'program_id' => $id,
            ]);

            $schedule->save();

            return redirect('/')->with('success', 'Расписание добавлено!');
        }
    }

    public function delete(Schedule $schedule)
    {
        $schedule->delete();

        return redirect('/');
    }

    public function approve(Schedule $schedule)
    {
        $schedule->status =1;
        $schedule->save();

        return redirect('/');
    }
}
