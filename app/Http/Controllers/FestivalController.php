<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Festival;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FestivalController extends Controller
{
    public function index()
    {
        return view('admin.festivals', [
            'festivals' => Festival::all()->sortByDesc('id'),
        ]);
    }

    public function all()
    {
        $xmlDataString = file_get_contents(asset('files/xml/festival.xml'));
        $xmlObject = simplexml_load_string($xmlDataString);
        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true);

        $actual_festival = Festival::all()->last();
        return view('festivals', [
            'festivals' => Festival::all()->where('id', '!=', $actual_festival->id),
            'actual_festival' => $actual_festival,
            'data' => $phpDataArray
        ]);
    }

    public function create()
    {
        return view('admin.festival', [
            'technologies' => Technology::all()
        ]);
    }

    public function store(Request $request)
    {
        $festival = new Festival;
        if ($request['id'] != null) {
            $festival->id = $request['id'];
        }
        $festival->name = $request['name'];
        $festival->start = $request['start'];
        $festival->end = $request['end'];
        $festival->deadline = $request['deadline'];
        $festival->deadline_members = $request['deadline_members'];
        $festival->save();

        $new_festival = Festival::all()->last();

        if ($request->input('technology') != null) {
            foreach ($request->input('technology') as $key => $value) {
                DB::table('festival_technologies')->insert([
                    [
                        'festival_id' => $new_festival->id,
                        'technology_id' => $value
                    ],
                ]);
            }
        }

        return redirect('admin/festivals');
    }

    public function show($id)
    {
        $festival = Festival::find($id);
        if (isset($festival)) {
            return view('festival', [
                'festival' => Festival::find($id),
            ]);
        }else{
            return abort(404);
        }
    }

    public function applications($id)
    {
        $festival = Festival::find($id);
        if (isset($festival)) {
            return view('applications', [
                'apps' => Application::all()->where('festival_id', $id)->where('member_status_id', '!=', '1')->sortBy('name'),
                'festival' => Festival::find($id)
            ]);
        }else{
            return abort(404);
        }
    }

    public function edit($id)
    {
        $festival = Festival::find($id);
        if (isset($festival)) {
            return view('admin.festival', [
                'technologies' => Technology::all(),
                'festival' => Festival::find($id)
            ]);
        }else{
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $festival = Festival::find($id);
        $festival_id = $id;
        if ($request['id'] != null) {
            $festival->id = $request['id'];
            $festival_id = $request['id'];
        }
        $festival->name = $request['name'];
        $festival->start = $request['start'];
        $festival->end = $request['end'];
        $festival->deadline = $request['deadline'];
        $festival->deadline_members = $request['deadline_members'];
        $festival->save();

        DB::table('festival_technologies')->where('festival_id', '=', $festival_id)->delete();
        if ($request->input('technology') != null) {
            foreach ($request->input('technology') as $key => $value) {
                DB::table('festival_technologies')->insert([
                    [
                        'festival_id' => $festival_id,
                        'technology_id' => $value
                    ],
                ]);
            }
        }

        return redirect('admin/festivals');
    }

    public function destroy(Festival $festival)
    {
        //
    }
}
