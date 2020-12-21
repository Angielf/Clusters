<?php

namespace App\Http\Controllers;

use App\Agreement;
use App\Student;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    public function index($id)
    {
        $student = Student::where('id', $id)->first();

        return view('agreement', compact('student'));
    }

    public function add(Request $request, $id)
    {
        if($request->hasFile('agreement')) {
            $file = $request->file('agreement');
            $file_name = $id . time() . '.' . $request->agreement->extension();
            $file->move(public_path() . '/files/agreements/', $file_name);

            $agreement = new Agreement([
                'filename' => $file_name,
                'student_id' => $id,
            ]);

            $agreement->status = 1;

            $agreement->save();

            return redirect('/')->with('success', 'Договор добавлен!');
        }
    }

    public function delete(Agreement $agreement)
    {
        $agreement->delete();

        return redirect('/');
    }

    // public function approve(Agreement $agreement)
    // {
    //     $agreement->status = 1;
    //     $agreement->save();

    //     return redirect('/');
    // }
}
