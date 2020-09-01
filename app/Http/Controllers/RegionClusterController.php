<?php

namespace App\Http\Controllers;

use App\District;
use App\RegionCluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegionClusterController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $districts = District::all();

        return view('region-clusters.create', compact(['user', 'districts']));
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

        $cluster = new RegionCluster([
            'user_id' => $user->id,
            'district_id' => $district->id,
            'schools' => $files,
        ]);

        $cluster->save();
        return redirect('/')->with('success', 'Заявка на кластер добавлена!');
    }
}
