<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index($id)
    {
        $schedule = Schedule::where('id', $id)->first();

        return view('student', compact('schedule'));
    }

    public function add(Request $request, $id)
    {
        if($request->hasFile('student')) {
            $file = $request->file('student');
            $file_name = $id . time() . '.' . $request->schedule->extension();
            $file->move(public_path() . '/files/students/', $file_name);

            $schedule = new Student([
                'filename' => $file_name,
                'schedule_id' => $id,
            ]);

            $schedule->save();

            return redirect('/')->with('success', 'Ученики добавлены!');
        }
    }

    public function delete(Student $schedule)
    {
        $student->delete();

        return redirect('/');
    }

    public function approve(Student $schedule)
    {
        $student->status = 1;
        $student->save();

        return redirect('/');
    }
}