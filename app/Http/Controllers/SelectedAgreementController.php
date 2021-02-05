<?php

namespace App\Http\Controllers;

use App\SelectedAgreement;
use App\SelectedStudent;
use Illuminate\Http\Request;

class SelectedAgreementController extends Controller
{
    public function index($id)
    {
        $selected_student = SelectedStudent::where('id', $id)->first();

        return view('proposed.selected_agreement', compact('selected_student'));
    }

    public function add(Request $request, $id)
    {
        if($request->hasFile('selected_agreement')) {
            $file = $request->file('selected_agreement');
            $file_name = $id . time() . '.' . $request->selected_agreement->extension();
            $file->move(public_path() . '/files/selected_agreements/', $file_name);

            $selected_agreement = new SelectedAgreement([
                'filename' => $file_name,
                'selected_student_id' => $id,
            ]);

            $selected_agreement->status = 1;

            $selected_agreement->save();

            return redirect('/')->with('success', 'Договор добавлен!');
        }
    }

    public function delete(SelectedAgreement $selected_agreement)
    {
        $selected_agreement->delete();

        return redirect('/');
    }

}
