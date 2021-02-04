<?php

namespace App\Http\Controllers;

use App\Proposed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposedController extends Controller
{
    public function add()
    {
        return view('proposed.add');
    }

    public function adding(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'subject' => 'required',
            'program' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $file = $request->file('program');
        $file_name = time() . '.' . $request->program->extension();
        $file->move(public_path() . '/files/proposed_programs/', $file_name);

        $p = new Proposed([
            'class' =>  serialize($request->post('class')),
            'subject' => $request->post('subject'),
            'content' => $request->post('content'),
            'modul' => $request->post('modul'),
            'hours' => $request->post('hours'),
            'educational_program' => $request->post('educational_program'),
            'educational_activity' => $request->post('educational_activity'),
            'form_of_education' => $request->post('form_of_education'),
            'form_education_implementation' => $request->post('form_education_implementation'),
            'date_begin' => $request->post('date_begin'),
            'date_end' => $request->post('date_end'),
            'user_id' => $user_id,
            'filename' => $file_name,
        ]);

        $p->status = 0;

        $p->save();

        return redirect('/');
    }
}
