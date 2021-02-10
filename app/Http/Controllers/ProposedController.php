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

    public function show_update(Proposed $proposed_program)
    {
        return view('proposed.update', compact('proposed_program'));
    }

    public function delete_proposed(Proposed $proposed_program)
    {
        $proposed_program->delete();

        return redirect('/');
    }

    public function update_class(Request $request, Proposed $proposed_program)
    {
        $class = $request->input('class');
        $proposed_program->update(['class' => serialize($class)]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_subject(Request $request, Proposed $proposed_program)
    {
        $subject = $request->input('subject');
        $proposed_program->update(['subject' => $subject]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_modul(Request $request, Proposed $proposed_program)
    {
        $modul = $request->input('modul');
        $proposed_program->update(['modul' => $modul]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_hours(Request $request, Proposed $proposed_program)
    {
        $hours = $request->input('hours');
        $proposed_program->update(['hours' => $hours]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_form_of_education(Request $request, Proposed $proposed_program)
    {
        $form_of_education = $request->input('form_of_education');
        $proposed_program->update(['form_of_education' => $form_of_education]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_form_education_implementation(Request $request, Proposed $proposed_program)
    {
        $form_education_implementation = $request->input('form_education_implementation');
        $proposed_program->update(['form_education_implementation' => $form_education_implementation]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_educational_program(Request $request, Proposed $proposed_program)
    {
        $educational_program = $request->input('educational_program');
        $proposed_program->update(['educational_program' => $educational_program]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_educational_activity(Request $request, Proposed $proposed_program)
    {
        $educational_activity = $request->input('educational_activity');
        $proposed_program->update(['educational_activity' => $educational_activity]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_date_begin(Request $request, Proposed $proposed_program)
    {
        $date_begin = $request->input('date_begin');
        $proposed_program->update(['date_begin' => $date_begin]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_date_end(Request $request, Proposed $proposed_program)
    {
        $date_end = $request->input('date_end');
        $proposed_program->update(['date_end' => $date_end]);

        return view('proposed.update', compact('proposed_program'));
    }

    public function update_content(Request $request, Proposed $proposed_program)
    {
        $content = $request->input('content');
        $proposed_program->update(['content' => $content]);

        return view('proposed.update', compact('proposed_program'));
    }
}
