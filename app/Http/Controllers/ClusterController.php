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
    private const CLUSTER_SERTIFIED = 2;
    private const RECIPIENT_SCHOOL = 0;
    private const REGIONAL_COORD = 1;
    private const BASE_SCHOOL = 2;
    private const REQUEST_BASE_SCHOOL = 5;

    public function add(Cluster $cluster)
    {
        $cluster->status = self::CLUSTER_SERTIFIED;
        $cluster->save();

        $user = $cluster->user;
        $user->status = self::BASE_SCHOOL;
        $user->save();

        return redirect('/clusters')->with('success', 'Заявка на кластер добавлена!');
    }

    public function requestbaseschool($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = self::REQUEST_BASE_SCHOOL;

        $user->save();

        return redirect('/');
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
            $school = User::where('id', $id)->first();
            $new_file['school_name'] = $school->fullname;
            $new_file['school_id'] = $id;
            array_push($files, $new_file);
        }

        $files = json_encode($files);

        $cluster = new Cluster([
            'user_id' => $user->id,
            'district_id' => $district->id,
            'schools' => $files,
            'status' => self::CLUSTER_APPROVED,
        ]);

        $cluster->save();

        $user->status = self::BASE_SCHOOL;
        $user->save();

        return redirect('/')->with('success', 'Заявка на кластер добавлена!');
    }

    public function addcontract($school_id, $cluster_id)
    {
        return view('clusters.addcontract', ['school_id' => $school_id, 'cluster_id' => $cluster_id]);
    }

    public function addingprogram(Request $request, $school_id, $cluster_id)
    {
        if($request->hasFile('contract')) {
            $file = $request->file('contract');
            $file_name = $school_id . time() . '.' . $request->contract->extension();
            $file->move(public_path() . '/files/contracts/', $file_name);

            $cluster = Cluster::where('id', $cluster_id)->first();
            $schools = json_decode($cluster->schools, true);
            foreach ($schools as $key => $school) {
                if ($school_id == $school['school_id']){
                    $k = $key;
                }
            }
            $schools[$k]['file_name'] = $file_name;
            $cluster->schools = json_encode($schools);

            $cluster->save();

            return redirect('/');
        }

        return redirect('/');
    }

    public function addagreement($cluster_id)
    {
        return view('clusters.addagreement', ['cluster_id' => $cluster_id]);
    }

    public function addingagreement(Request $request, $cluster_id)
    {
        if($request->hasFile('agreement')) {
            $file = $request->file('agreement');
            $file_name = $cluster_id . time() . '.' . $request->agreement->extension();
            $file->move(public_path() . '/files/agreements/', $file_name);

            $cluster = Cluster::where('id', $cluster_id)->first();
            $cluster->agreement = $file_name;

            $cluster->save();

            return redirect('/');
        }
    }

    public function addoneschool($baseSchoolId, Request $request)
    {
        if ($request->get('schoolid')) {
            $schoolId = $request->get('schoolid');
            $cluster = Cluster::where('user_id', $baseSchoolId)->first();
            $schoolsInCluster = json_decode($cluster->schools, true);
            $schoolName = User::where('id', $schoolId)->first()->fullname;
            $arr["school_name"] = $schoolName;
            $arr["school_id"] = $schoolId;
            array_push($schoolsInCluster, $arr);
            $cluster->schools = $schoolsInCluster;

            $cluster->save();

        }
        return redirect('/');
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
        $user = $cluster->user;
        $user->status = self::RECIPIENT_SCHOOL;

        $cluster->delete();

        $user->save();

        return redirect()->route('clusters.index')
            ->with('success','Кластер удален');
    }
}
