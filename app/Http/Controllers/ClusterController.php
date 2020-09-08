<?php

namespace App\Http\Controllers;

use App\Cluster;
use App\District;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClusterController extends Controller
{
    private const CLUSTER_APPROVED = 1;
    private const REGIONAL_COORD = 1;
    private const BASE_SCHOOL = 2;

    public function add(Cluster $cluster)
    {
        $cluster->status = self::CLUSTER_APPROVED;
        $cluster->save();

        $user = $cluster->user;
        $user->status = self::BASE_SCHOOL;
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
        if (Auth::user()->id === self::REGIONAL_COORD) {
            $clusters = Cluster::all();
            return view('clusters.index', compact('clusters'));
        } else return redirect('/');
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

        foreach ($request->post('schools') as $id) {
            $school = User::where('id', $id)->first();;
            $new_file['school_name'] = $school->fullname;
            $new_file['school_id'] = $id;
            array_push($files, $new_file);
        }

        $files = json_encode($files);

        $cluster = new Cluster([
            'user_id' => $user->id,
            'district_id' => $district->id,
            'schools' => $files,
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
