<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    private const BID_APPROVED = 1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bids = Bid::all()->where('user_id', Auth::user()->id);

        return view('bids.index', compact('bids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bids.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'subject' => 'required'
        ]);

        $user_id = Auth::user()->id;

        $bid = new Bid([
            'class' => serialize($request->post('class')),
            'subject' => $request->post('subject'),
            'content' => $request->post('content'),
            'modul' => $request->post('modul'),
            'hours' => $request->post('hours'),
            'educational_program' => serialize($request->post('educational_program')),
            'educational_activity' => serialize($request->post('educational_activity')),
            'form_of_education' => $request->post('form_of_education'),
            'form_education_implementation' => $request->post('form_education_implementation'),
            'date_begin' => $request->post('date_begin'),
            'date_end' => $request->post('date_end'),
            'user_id' => $user_id,
        ]);

        $bid->save();
        return redirect('/');
    }

    public function createrc($id)
    {
        return view('bids.createrc', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storerc(Request $request, $id)
    {
        $request->validate([
            'class' => 'required',
            'subject' => 'required'
        ]);

        $user_id = Auth::user()->id;

        $bid = new Bid([
            'class' => serialize($request->post('class')),
            'subject' => $request->post('subject'),
            'content' => $request->post('content'),
            'modul' => $request->post('modul'),
            'hours' => $request->post('hours'),
            'educational_program' => serialize($request->post('educational_program')),
            'educational_activity' => serialize($request->post('educational_activity')),
            'form_of_education' => $request->post('form_of_education'),
            'form_education_implementation' => $request->post('form_education_implementation'),
            'date_begin' => $request->post('date_begin'),
            'date_end' => $request->post('date_end'),
            'user_id' => $user_id,
            'rc_cluster_id' => $id,
        ]);
        $bid->save();
        return redirect('/');
    }

    public function add()
    {
        return view('bids.add');
    }

    public function adding(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'subject' => 'required',
            'program' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $bid = new Bid([
            'class' =>  serialize($request->post('class')),
            'subject' => $request->post('subject'),
            'content' => $request->post('content'),
            'modul' => $request->post('modul'),
            'hours' => $request->post('hours'),
            'educational_program' => serialize($request->post('educational_program')),
            'educational_activity' => serialize($request->post('educational_activity')),
            'form_of_education' => $request->post('form_of_education'),
            'form_education_implementation' => $request->post('form_education_implementation'),
            'date_begin' => $request->post('date_begin'),
            'date_end' => $request->post('date_end'),
            'user_id' => $user_id,
        ]);

        $bid->status = self::BID_APPROVED;

        $bid->save();

        $file = $request->file('program');
        $file_name = time() . '.' . $request->program->extension();
        $file->move(public_path() . '/files/programs/', $file_name);

        $program = new Program([
            'filename' => $file_name,
            'bid_id' => $bid->id,
        ]);

        $program->save();

        return redirect('/');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        return view('bids.show', compact('bid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        if (Auth::user()->id === 1) {
            return view('bids.edit', compact('bid'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        $request->validate([
            'date_of_bid' => 'required',
            'status' => 'required',
        ]);

        $bid->update($request->all());


        return redirect()->route('home')
            ->with('success', 'Аппеляция изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bid $bid
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Bid $bid)
    {
        $bid->delete();

        return redirect()->route('bid.index')
            ->with('success', 'Аппеляция удалена');
    }

    public function delete(Bid $bid)
    {
        $bid->delete();

        return redirect('/');
    }

    public function delete2(Bid $bid)
    {
        foreach($bid->programs() as $program){
            $program->delete();
        }

        $bid->delete();

        return redirect('/');
    }

    public function show_update(Bid $bid)
    {
        return view('bids.update', compact('bid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function update_class(Request $request, Bid $bid)
    {
        $class = $request->input('class');
        $bid->update(['class' => serialize($class)]);

        return view('bids.update', compact('bid'));
    }

    public function update_subject(Request $request, Bid $bid)
    {
        $subject = $request->input('subject');
        $bid->update(['subject' => $subject]);

        return view('bids.update', compact('bid'));
    }

    public function update_modul(Request $request, Bid $bid)
    {
        $modul = $request->input('modul');
        $bid->update(['modul' => $modul]);

        return view('bids.update', compact('bid'));
    }

    public function update_hours(Request $request, Bid $bid)
    {
        $hours = $request->input('hours');
        $bid->update(['hours' => $hours]);

        return view('bids.update', compact('bid'));
    }

    public function update_form_of_education(Request $request, Bid $bid)
    {
        $form_of_education = $request->input('form_of_education');
        $bid->update(['form_of_education' => $form_of_education]);

        return view('bids.update', compact('bid'));
    }

    public function update_form_education_implementation(Request $request, Bid $bid)
    {
        $form_education_implementation = $request->input('form_education_implementation');
        $bid->update(['form_education_implementation' => $form_education_implementation]);

        return view('bids.update', compact('bid'));
    }

    public function update_educational_program(Request $request, Bid $bid)
    {
        $educational_program = $request->input('educational_program');
        $bid->update(['educational_program' => serialize($educational_program)]);

        return view('bids.update', compact('bid'));
    }

    public function update_educational_activity(Request $request, Bid $bid)
    {
        $educational_activity = $request->input('educational_activity');
        $bid->update(['educational_activity' => serialize($educational_activity)]);

        return view('bids.update', compact('bid'));
    }

    public function update_date_begin(Request $request, Bid $bid)
    {
        $date_begin = $request->input('date_begin');
        $bid->update(['date_begin' => $date_begin]);

        return view('bids.update', compact('bid'));
    }

    public function update_date_end(Request $request, Bid $bid)
    {
        $date_end = $request->input('date_end');
        $bid->update(['date_end' => $date_end]);

        return view('bids.update', compact('bid'));
    }

    public function update_content(Request $request, Bid $bid)
    {
        $content = $request->input('content');
        $bid->update(['content' => $content]);

        return view('bids.update', compact('bid'));
    }

    public function back_programs(Bid $bid)
    {

        foreach($bid->programs() as $program){
            $program->delete();
        }

        $bid->status = 0;

        $bid->save();

        return redirect('/');
    }
}
