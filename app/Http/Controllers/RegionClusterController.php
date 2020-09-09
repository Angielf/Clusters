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

        foreach ($request->post('schools') as $id) {
                $region_cluster = new RegionCluster([
                    'organisation' => $organisation,
                    'user_id' => $id,
                ]);

                $region_cluster->save();
        }

        return redirect('/');
    }

    public function addcontract($id)
    {
        return view('region-clusters.addcontract', ['id' => $id]);
    }

    public function addingprogram(Request $request, $id)
    {
        if($request->hasFile('contract')) {
            $file = $request->file('contract');
            $file_name = $id . time() . '.' . $request->contract->extension();
            $file->move(public_path() . '/files/rc/contracts/', $file_name);

            $region_cluster = RegionCluster::where('id', $id)->first();

            $region_cluster->filename = $file_name;

            $region_cluster->save();

            return redirect('/');
        }
    }
}
