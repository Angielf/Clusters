<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
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
            'form_of_education' => $request->post('form_of_education'),
            'form_education_implementation' => $request->post('form_education_implementation'),
            'user_id' => $user_id,
        ]);

        $bid->save();
        return redirect('/')->with('success', 'Заявка добавлена!');
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
            'form_of_education' => $request->post('form_of_education'),
            'form_education_implementation' => $request->post('form_education_implementation'),
            'user_id' => $user_id,
        ]);

        $bid->status = 1;

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
}
