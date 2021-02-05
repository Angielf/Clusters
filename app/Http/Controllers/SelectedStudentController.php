<?php

namespace App\Http\Controllers;

use App\SelectedSchedule;
use App\SelectedStudent;
use Illuminate\Http\Request;

class SelectedStudentController extends Controller
{
    public function index($id)
    {
        $selected_schedule = SelectedSchedule::where('id', $id)->first();

        return view('proposed.selected_student', compact('selected_schedule'));
    }

    public function add(Request $request, $id)
    {
        if($request->hasFile('selected_students')) {
            $file = $request->file('selected_students');
            $file_name = $id . time() . '.' . $request->selected_students->extension();
            $file->move(public_path() . '/files/selected_students/', $file_name);

            $selected_student = new SelectedStudent([
                'filename' => $file_name,
                'selected_schedule_id' => $id,
                'students_amount' => $request->post('selected_student'),
            ]);

            $selected_student->status = 1;

            $selected_student->save();

            return redirect('/')->with('success', 'Ученики добавлены!');
        }
    }

    public function delete(SelectedStudent $selected_student)
    {
        $selected_student->delete();

        return redirect('/');
    }

}
