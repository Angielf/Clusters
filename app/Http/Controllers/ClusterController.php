<?php

namespace App\Http\Controllers;

use App\Cluster;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClusterController extends Controller
{
    public function add(Cluster $cluster)
    {
        $cluster->status = 1;
        $cluster->save();

        $user = $cluster->user;
        $user->status = 2;
        $user->save();

        return redirect('/clusters')->with('success', 'Заявка на кластер добавлена!');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clusters = Cluster::all();

        return view('clusters.index', compact('clusters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $district = $user->getDistrict;

        return view('clusters.create', compact(['user', 'district']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $district = $user->getDistrict;
        $files = [];
        foreach ($district->users as $school) {
            $id = $school->id;
            if($request->hasFile($id)) {
                $file = $request->$id;
                $file_name = $id . time().'.'.$request->$id->extension();
                $file->move(public_path() . '/files', $file_name);
                $new_file['file_name']= $file_name;
                $new_file['school_id'] = $school->id;
                $new_file['school_name'] = $school->fullname;

                array_push($files, $new_file);
            }
        }
        $files = json_encode($files);

        if($request->hasFile('agreement')) {
            $file = $request->file('agreement');
            $agreement = time() . '.' . $request->agreement->extension();
            $file->move(public_path() . '/files/agreements/', $agreement);
        }

        $cluster = new Cluster([
            'user_id' => $user->id,
            'district_id' => $district->id,
            'schools' => $files,
            'agreement' => $agreement,
        ]);

        $cluster->save();
        return redirect('/')->with('success', 'Заявка на кластер добавлена!');
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

        return redirect()->route('clusters.index')
            ->with('success','Кластер удален');
    }
}
