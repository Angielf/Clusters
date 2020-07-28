<?php

namespace App\Http\Controllers;

use App\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClusterController extends Controller
{
    public function add()
    {
        $user = Auth::user();
        $district_id = $user->district;
        $cluster = new Cluster([
            'user_id' => $user->id,
            'district_id' => $user->district,
            'status' => 1,
        ]);

        $cluster->save();

        return redirect('/')->with('success', 'Заявка на кластер добавлена!');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clusters = Cluster::all()->where('user_id', Auth::user()->id);

        return view('clusters.index', compact('clusters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clusters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class'=>'required',
            'subject'=>'required'
        ]);

        $user_id = Auth::user()->id;

        $cluster = new Cluster([
            'class' => $request->post('class'),
            'subject' => $request->post('subject'),
            'content' => $request->post('content'),
            'user_id' => $user_id,
        ]);

        $cluster->save();
        return redirect('/clusters')->with('success', 'Заявка на кластер добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function show(Cluster $cluster)
    {
        return view('clusters.show',compact('cluster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function edit(Cluster $cluster)
    {
        if (Auth::user()->id === 1) {
            return view('clusters.edit', compact('cluster'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cluster $cluster)
    {
        $request->validate([
            'date_of_cluster' => 'required',
            'status' => 'required',
        ]);

        $cluster->update($request->all());


        return redirect()->route('home')
            ->with('success','Кластер изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cluster $cluster
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Cluster $cluster)
    {
        $cluster->delete();

        return redirect()->route('cluster.index')
            ->with('success','Кластер удален');
    }
}
