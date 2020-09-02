<?php

namespace App\Http\Controllers;

use App\District;
use App\RegionCluster;
use App\User;
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
        $organisation = $user->id;

        for ($i=1; $i<797; $i++) {
            if($request->hasFile($i)) {
                $file = $request->$i;
                $file_name = $i . time().'.'.$request->$i->extension();
                $file->move(public_path() . '/files/rc/', $file_name);
                $region_cluster = new RegionCluster([
                    'organisation' => $organisation,
                    'user_id' => $i,
                    'filename' => $file_name,
                ]);

                $region_cluster->save();
            }
        }

        return redirect('/');
    }
}
